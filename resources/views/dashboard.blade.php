<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="mt-6 flex space-x-12" style="height: 250px">
        <div class="bg-white rounded-lg shadow p-4" >
            <h3 class="font-bold text-lg">Statistiques Eleve</h3>
            <canvas id="chart1" class="mt-4"></canvas>
        </div>
        <div class="bg-white rounded-lg shadow p-4">
            <h3 class="font-bold text-lg">Statistiques Ecole</h3>
            <canvas id="chart2" class="mt-4"></canvas>
            <p></p>
        </div>
        <div class="bg-white rounded-lg shadow p-4">
            <h3 class="font-bold text-lg">Statistiques Chef d'établissement</h3>
            <canvas id="chart3" class="mt-4"></canvas>
        </div>
    </div>
    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Card 1 -->
        <div class="bg-white rounded-lg shadow p-4 flex items-center">
            <span class="bg-blue-500 text-white rounded-full p-2 mr-4">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 20a1 1 0 01-1-1v-5H5a1 1 0 110-2h4V8a1 1 0 012 0v4h4a1 1 0 110 2h-4v5a1 1 0 01-1 1z" />
                </svg>
            </span>
            <div>
                <h3 class="font-bold text-lg">Nouveaux Utilisateurs</h3>
                <p class="mt-2 text-gray-600">+15 depuis la dernière semaine</p>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="bg-white rounded-lg shadow p-4 flex items-center">
            <span class="bg-green-500 text-white rounded-full p-2 mr-4">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 3a7 7 0 100 14 7 7 0 000-14zm1 10h-2V8h2v5z" />
                </svg>
            </span>
            <div>
                <h3 class="font-bold text-lg">Consultation</h3>
                <p class="mt-2 text-gray-600">+20% par rapport au mois dernier</p>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="bg-white rounded-lg shadow p-4 flex items-center">
            <span class="bg-red-500 text-white rounded-full p-2 mr-4">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 2a8 8 0 00-8 8h1a7 7 0 1114 0h1a8 8 0 00-8-8z" />
                </svg>
            </span>
            <div>
                <h3 class="font-bold text-lg">Ecoles enregistrées</h3>
                <p class="mt-2 text-gray-600">+5 en cours</p>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="bg-white rounded-lg shadow p-4 flex items-center">
            <span class="bg-yellow-500 text-white rounded-full p-2 mr-4">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 2a8 8 0 100 16 8 8 0 000-16z" />
                </svg>
            </span>
            <div>
                <h3 class="font-bold text-lg">Tâches en Retard</h3>
                <p class="mt-2 text-gray-600">3 tâches en retard</p>
            </div>
        </div>

        <!-- Card 5 -->
        <div class="bg-white rounded-lg shadow p-4 flex items-center">
            <span class="bg-purple-500 text-white rounded-full p-2 mr-4">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 2a8 8 0 100 16 8 8 0 000-16z" />
                </svg>
            </span>
            <div>
                <h3 class="font-bold text-lg">Feedback Clients</h3>
                <p class="mt-2 text-gray-600">8 nouvelles réponses</p>
            </div>
        </div>

        <!-- Card 6 -->
        <div class="bg-white rounded-lg shadow p-4 flex items-center">
            <span class="bg-teal-500 text-white rounded-full p-2 mr-4">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 2a8 8 0 100 16 8 8 0 000-16z" />
                </svg>
            </span>
            <div>
                <h3 class="font-bold text-lg">Messages Non Lus</h3>
                <p class="mt-2 text-gray-600">12 messages non lus</p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const data1 = {
            labels: ['Homme', 'Femme'],
            datasets: [{
                label: 'Statistiques',
                data: [750, 550],
                backgroundColor: ['rgba(54, 162, 235, 0.6)', 'rgba(255, 99, 132, 0.6)'],
                borderColor: ['rgba(54, 162, 235, 1)', 'rgba(255, 99, 132, 1)'],
                borderWidth: 1
            }]
        };
        const data2 = {
            labels: ['Public', 'Privée'],
            datasets: [{
                label: 'Statistiques',
                data: [6, 4],
                backgroundColor: ['rgba(54, 162, 235, 0.6)', 'rgba(255, 99, 132, 0.6)'],
                borderColor: ['rgba(54, 162, 235, 1)', 'rgba(255, 99, 132, 1)'],
                borderWidth: 1
            }]
        };
        const data3 = {
            labels: ['Homme', 'Femme'],
            datasets: [{
                label: 'Statistiques',
                data: [6, 4],
                backgroundColor: ['rgba(54, 162, 235, 0.6)', 'rgba(255, 99, 132, 0.6)'],
                borderColor: ['rgba(54, 162, 235, 1)', 'rgba(255, 99, 132, 1)'],
                borderWidth: 1
            }]
        };

        const config1 = {
            type: 'bar',
            data: data1,
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };
        const config2 = {
            type: 'bar',
            data: data2,
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };
        const config3 = {
            type: 'bar',
            data: data3,
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        const chart1 = new Chart(document.getElementById('chart1'), config1);
        const chart2 = new Chart(document.getElementById('chart2'), config2);
        const chart3 = new Chart(document.getElementById('chart3'), config3);
    </script>
</x-app-layout>
