document.addEventListener('DOMContentLoaded', function () {
    // Data sample statis
    const sampleData = [
        { reading_time: '2024-07-21 10:00', temperature: 27.3, humidity: 64, status_diffuser: 'Hidup' },
        { reading_time: '2024-07-21 11:00', temperature: 28.1, humidity: 63, status_diffuser: 'Mati' },
        { reading_time: '2024-07-21 12:00', temperature: 29.0, humidity: 62, status_diffuser: 'Hidup' },
        { reading_time: '2024-07-21 13:00', temperature: 29.5, humidity: 61, status_diffuser: 'Mati' },
        { reading_time: '2024-07-21 14:00', temperature: 30.2, humidity: 60, status_diffuser: 'Hidup' }
    ];

    // Fungsi untuk memperbarui nilai sensor di kartu
    function updateSensorValues(data) {
        document.getElementById('temperature').textContent = `${data.temperature} °C`;
        document.getElementById('humidity').textContent = `${data.humidity} %`;
        document.getElementById('status-diffuser').textContent = data.status_diffuser;
    }

    // Fungsi untuk merender grafik
    function renderChart(data) {
        const ctx = document.getElementById('myChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: data.map(entry => entry.reading_time),
                datasets: [
                    {
                        label: 'Suhu (°C)',
                        data: data.map(entry => entry.temperature),
                        borderColor: 'rgba(255, 99, 132, 1)',
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        fill: false,
                        tension: 0.1
                    },
                    {
                        label: 'Kelembapan (%)',
                        data: data.map(entry => entry.humidity),
                        borderColor: 'rgba(54, 162, 235, 1)',
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        fill: false,
                        tension: 0.1
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        type: 'time',
                        time: {
                            unit: 'hour',
                            tooltipFormat: 'YYYY-MM-DD HH:mm',
                            displayFormats: {
                                hour: 'YYYY-MM-DD HH:mm'
                            }
                        },
                        title: {
                            display: true,
                            text: 'Waktu'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Nilai'
                        }
                    }
                }
            }
        });
    }

    // Fungsi untuk mengisi tabel data
    function populateTable(data) {
        const tableBody = document.getElementById('data-table');
        tableBody.innerHTML = ''; // Hapus data yang ada
        data.forEach(entry => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${entry.reading_time}</td>
                <td>${entry.temperature}</td>
                <td>${entry.humidity}</td>
                <td>${entry.status_diffuser}</td>
            `;
            tableBody.appendChild(row);
        });
    }

    // Inisialisasi dashboard dengan data sampel
    function initializeDashboard() {
        const latestData = sampleData[sampleData.length - 1];
        updateSensorValues(latestData); // Perbarui dengan data terbaru
        renderChart(sampleData);
        populateTable(sampleData);
    }

    // Inisialisasi dashboard
    initializeDashboard();
});
