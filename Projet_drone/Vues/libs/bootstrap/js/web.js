document.addEventListener('DOMContentLoaded', function () {
    // Sélection des éléments DOM
    const DOM = {
        hamburger: document.querySelector('.hamburger'),
        wrapper: document.querySelector('.wrapper'),
        chartContainer: document.getElementById('chartContainer'),
        resetButton: document.getElementById('resetStats')
    };

    // Gestion des événements du menu hamburger
    DOM.hamburger.addEventListener('click', () => DOM.wrapper.classList.toggle('collapse'));

    // Classe de gestion des statistiques
    class StatsManager {
        constructor() {
            this.essais = [];
            this.reussites = [];
            this.echecs = [];
            this.total = { reussites: 0, echecs: 0 };
            this.load();
        }

        recordAttempt(type) {
            if (type !== 'Reussite' && type !== 'Echec') {
                console.error("Type d'essai invalide");
                return;
            }
            this.essais.push(this.essais.length + 1);
            if (type === 'Reussite') this.total.reussites++;
            if (type === 'Echec') this.total.echecs++;
            this.reussites.push(this.total.reussites);
            this.echecs.push(this.total.echecs);
            this.save();
        }

        save() {
            try {
                localStorage.setItem('simulationStats', JSON.stringify(this));
            } catch (e) {
                console.error("Erreur lors de la sauvegarde des statistiques :", e);
            }
        }

        load() {
            const saved = localStorage.getItem('simulationStats');
            if (saved) {
                Object.assign(this, JSON.parse(saved));
            }
        }

        reset() {
            localStorage.removeItem('simulationStats');
            location.reload();
        }
    }

    // Classe de gestion du graphique
    class LineChartManager {
        constructor() {
            this.ctx = document.getElementById("lineChart");
            if (!this.ctx) {
                console.error("Élément canvas introuvable !");
                return;
            }
            this.ctx = this.ctx.getContext("2d");
            this.chart = null;
            this.initialize();
        }

        initialize() {
            this.chart = new Chart(this.ctx, {
                type: 'line',
                data: {
                    labels: [],
                    datasets: [
                        {
                            label: 'Réussites',
                            data: [],
                            borderColor: 'green',
                            backgroundColor: 'rgba(0, 255, 0, 0.2)',
                            fill: false,
                            tension: 0.1
                        },
                        {
                            label: 'Échecs',
                            data: [],
                            borderColor: 'red',
                            backgroundColor: 'rgba(255, 0, 0, 0.2)',
                            fill: false,
                            tension: 0.1
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            title: { display: true, text: "Nombre d'essais" }
                        },
                        y: {
                            beginAtZero: true,
                            title: { display: true, text: "Cumul des résultats" }
                        }
                    }
                }
            });
        }

        update(data) {
            this.chart.data.labels = data.essais;
            this.chart.data.datasets[0].data = data.reussites;
            this.chart.data.datasets[1].data = data.echecs;
            this.chart.update();
        }
    }

    // Initialisation des classes
    const stats = new StatsManager();
    const chart = new LineChartManager();

    // Gestion des clics sur les cartes (délégation d'événements)
    document.body.addEventListener('click', (e) => {
        const card = e.target.closest('.simulation-card');
        if (card) {
            stats.recordAttempt(card.dataset.type);
            chart.update(stats);
        }
    });

    // Bouton de réinitialisation des statistiques
    if (DOM.resetButton) {
        DOM.resetButton.addEventListener('click', () => stats.reset());
    }
});