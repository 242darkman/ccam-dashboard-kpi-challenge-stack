"use client";

import {
    CategoryScale,
    Chart as ChartJS,
    Legend,
    LineElement,
    LinearScale,
    PointElement,
    Title,
    Tooltip
} from 'chart.js';

import { Line } from 'react-chartjs-2';
import React from 'react';

ChartJS.register(
    CategoryScale, 
    LinearScale, 
    PointElement, 
    LineElement, 
    Title, 
    Tooltip, 
    Legend
);

const LineGraph = ({ data }) => {
    const chartData = {
        labels: ['Livraison de jour en semaine', 'Livraison de nuit le weekend', 'Livraison de jour le week-end', 'Livraison de nuit en semaine'],
        datasets: [
            {
                label: 'Livraison de jour en semaine',
                data: [data.weekdayDiurne, 0, 0, 0],
                borderColor: 'rgb(255, 99, 132)',
                backgroundColor: 'rgba(255, 99, 132, 0.5)',
                fill: false,
            },
            {
                label: 'Weekend Nocturne',
                data: [0, data.weekendNocturne, 0, 0],
                borderColor: '#22577A',
                backgroundColor: '#22577A',
                fill: false,
            },
            {
                label: 'Weekend Diurne',
                data: [0, 0, data.weekendDiurne, 0],
                borderColor: 'rgb(255, 206, 86)',
                backgroundColor: 'rgba(255, 206, 86, 0.5)',
                fill: false,
            },
            {
                label: 'Weekday Nocturne',
                data: [0, 0, 0, data.weekdayNocturne],
                borderColor: '#57CC99',
                backgroundColor: '#57CC99',
                fill: false,
            },
        ],
    };

    const options = {
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true,
            },
        },
        plugins: {
            title: {
                display: true,
                text: 'Tendances des Livraisons',
            },
        },
    };

    return (
        <div style={{ height: '400px', width: '600px' }}>
            <Line data={chartData} options={options} />
        </div>
    );
};

export default LineGraph;
