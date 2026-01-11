import ApexCharts from 'apexcharts';

document.addEventListener('DOMContentLoaded', () => {
    const { months, monthlyIncome, monthlySold } = window;
    if (!months || !monthlyIncome || !monthlySold) return;

    const currentMonth = new Date().getMonth();

    document.getElementById('totalIncome').innerText =
        monthlyIncome[currentMonth]?.toLocaleString('id-ID') ?? '0';

    document.getElementById('monthlySold').innerText =
        monthlySold[currentMonth] ?? '0';

    const el = document.querySelector('#incomeChart');
    if (!el) return;

    new ApexCharts(el, {
        chart: { type: 'area', height: 350 },
        series: [{ name: 'Penghasilan', data: monthlyIncome }],
        xaxis: { categories: months },
        stroke: { curve: 'smooth' }
    }).render();
});
