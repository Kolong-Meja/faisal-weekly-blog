<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Admin dashboard is a main page that is useful for displaying important data.">

    <title>Faisal Weekly Blog | Admin Dashboard</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- Trix Editor --}}
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>

    {{-- Chart JS --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')
        <header class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Dashboard') }}
                </h2>
            </div>
        </header>
        <main class="py-12">
            <div class="max-w-full mx-auto sm:px-6 lg:px-8">
                {{-- Session Message --}}
                <div x-data="{ showMessage:true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 3000)">
                    @if (session()->has("success"))
                        <x-success-session />
                    @elseif (session()->has("error"))
                        <x-error-session />
                    @endif
                </div>

                <div class="flex flex-col space-y-6">
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-4">

                        {{-- Users card --}}
                        <div class="max-w-full bg-white rounded-lg border border-gray-200">
                            <div class="flex items-center justify-between p-4 border-b border-gray-200">
                                <div class="bg-gray-900 rounded-lg p-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-people-fill h-8 w-8 text-gray-100" viewBox="0 0 16 16">
                                        <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                                    </svg>
                                </div>
                                <h1 class="text-base font-medium">
                                    Today's users
                                    <div class="text-end font-bold text-4xl">
                                        {{ $usersStats->new_data ?? '0' }}
                                    </div>
                                </h1>
                            </div>

                            {{-- Need to be fix asap --}}
                            <div class="flex items-center p-4">
                                <p class="text-lg">
                                    <span class="text-green-500 font-bold">
                                        +{{ $usersTotalPercentage }}%
                                    </span>
                                    than last week
                                </p>
                            </div>
                        
                        </div>

                        {{-- Articles card --}}
                        <div class="max-w-full bg-white rounded-lg border border-gray-200">
                            <div class="flex items-center justify-between p-4 border-b border-gray-200">
                                <div class="bg-gray-900 rounded-lg p-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-file-post w-8 h-8 text-gray-100 bg-gray-900" viewBox="0 0 16 16">
                                        <path d="M4 3.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5z"/>
                                        <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1"/>
                                    </svg>
                                </div>
                                <h1 class="text-base font-medium">
                                    Today's articles
                                    <div class="text-end font-bold text-4xl">
                                        {{ $articleStats->new_data ?? '0' }}
                                    </div>
                                </h1>
                            </div>
                            
                            {{-- Need to be fix asap --}}
                            <div class="flex items-center p-4">
                                <p class="text-lg">
                                    <span class="text-green-500 font-bold">
                                        +{{ $articlesTotalPercentage }}%
                                    </span>
                                    than last week
                                </p>
                            </div>
                        
                        </div>

                        {{-- Categories card --}}
                        <div class="max-w-full bg-white rounded-lg border border-gray-200">
                            <div class="flex items-center justify-between p-4 border-b border-gray-200">
                                <div class="bg-gray-900 rounded-lg p-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-bookmark-star-fill w-8 h-8 text-gray-100 bg-gray-900" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5M8.16 4.1a.178.178 0 0 0-.32 0l-.634 1.285a.18.18 0 0 1-.134.098l-1.42.206a.178.178 0 0 0-.098.303L6.58 6.993c.042.041.061.1.051.158L6.39 8.565a.178.178 0 0 0 .258.187l1.27-.668a.18.18 0 0 1 .165 0l1.27.668a.178.178 0 0 0 .257-.187L9.368 7.15a.18.18 0 0 1 .05-.158l1.028-1.001a.178.178 0 0 0-.098-.303l-1.42-.206a.18.18 0 0 1-.134-.098z"/>
                                    </svg>
                                </div>
                                <h1 class="text-base font-medium">
                                    Today's categories
                                    <div class="text-end font-bold text-4xl">
                                        {{ $categoryStats->new_data ?? '0' }}
                                    </div>
                                </h1>
                            </div>

                            {{-- Need to be fix asap --}}
                            <div class="flex items-center p-4">
                                <p class="text-lg">
                                    <span class="text-green-500 font-bold">
                                        +{{ $categoriesTotalPercentage }}%
                                    </span>
                                    than last week
                                </p>
                            </div>
                        
                        </div>

                        {{-- Feedback card --}}
                        <div class="max-w-full bg-white rounded-lg border border-gray-200">
                            <div class="flex items-center justify-between p-4 border-b border-gray-200">
                                <div class="bg-gray-900 rounded-lg p-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-chat-dots-fill w-8 h-8 text-gray-100 bg-gray-900" viewBox="0 0 16 16">
                                        <path d="M16 8c0 3.866-3.582 7-8 7a9 9 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7M5 8a1 1 0 1 0-2 0 1 1 0 0 0 2 0m4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0m3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
                                    </svg>
                                </div>
                                <h1 class="text-base font-medium">
                                    Today's feedbacks
                                    <div class="text-end font-bold text-4xl">
                                        {{ $feedbackStats->new_data ?? '0' }}
                                    </div>
                                </h1>
                            </div>
                            
                            {{-- Need to be fix asap --}}
                            <div class="flex items-center p-4">
                                <p class="text-lg">
                                    <span class="text-green-500 font-bold">
                                        +{{ $feedbackTotalPercentage }}%
                                    </span>
                                    than last week
                                </p>
                            </div>
                        
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                        <div class="max-w-full max-h-full bg-white rounded-lg border border-gray-200">
                            <div class="flex items-center justify-between p-4 border-b border-gray-200">
                                <canvas id="line-chart"></canvas>
                            </div>
                            <div class="flex flex-col items-start p-4">
                                <p class="text-lg font-bold">Total of published articles</p>
                                <p class="text-gray-600">Last articles</p>
                            </div>
                        </div>

                        <div class="max-w-full max-h-full bg-white rounded-lg border border-gray-200">
                            <div class="flex items-center justify-between p-4 border-b border-gray-200">
                                <canvas id="bar-chart"></canvas>
                            </div>
                            <div class="flex flex-col items-start p-4">
                                <p class="text-lg font-bold">Total of published articles</p>
                                <p class="text-gray-600">Last articles</p>
                            </div>
                        </div>

                        <div class="max-w-full max-h-full bg-white rounded-lg border border-gray-200">
                            <div class="flex items-center justify-between p-4 border-b border-gray-200">
                                <canvas id="point-chart"></canvas>
                            </div>
                            <div class="flex flex-col items-start p-4">
                                <p class="text-lg font-bold">Total of published articles</p>
                                <p class="text-gray-600">Last articles</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script>
        const lineChartCtx = document.getElementById('line-chart');

        let labels = {{ Js::from($labels) }};
        let data = {{ Js::from($data) }};

        new Chart(lineChartCtx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: '# Of Articles',
                    data: data,
                    fill: false,
                    borderColor: 'rgb(17, 24, 39)',
                    tension: 0.1
                }],
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        ticks: {
                            color: 'rgb(17, 24, 39)',
                            beginAtZero: true,
                        },
                        border: {
                            display: true
                        },
                        grid: {
                            display: true,
                            color: 'rgb(17, 24, 39)'
                        }
                    },
                    x: {
                        ticks: {
                            color: 'rgb(17, 24, 39)',
                            beginAtZero: true,
                        },
                        border: {
                            display: true
                        },
                        grid: {
                            display: true,
                            color: 'rgb(120, 120, 120)'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        labels: {
                            color: 'rgb(17, 24, 39)',
                        }
                    },
                    subtitle: {
                        display: true,
                        text: 'Note: Monthly report on the total number of posts each month',
                        color: 'rgb(17, 24, 39)',
                        font: {
                            size: 14
                        }
                    }
                }
            }
        });

        const barChartCtx = document.getElementById('bar-chart');

        new Chart(barChartCtx, {
            type: 'bar',
            data: {
                labels: {{ Js::from($labels) }},
                datasets: [{
                    label: '# Of Articles',
                    data: {{ Js::from($data) }},
                    backgroundColor: [
                        'rgba(234, 179, 8, 0.8)',
                        'rgba(255, 159, 64, 0.8)',
                        'rgba(255, 205, 86, 0.8)',
                        'rgba(75, 192, 192, 0.8)',
                        'rgba(54, 162, 235, 0.8)',
                        'rgba(153, 102, 255, 0.8)',
                        'rgba(201, 203, 207, 0.8)'
                    ],
                    borderColor: 'rgb(17, 24, 39)',
                    borderWidth: 2,
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        ticks: {
                            color: 'rgb(17, 24, 39)',
                            beginAtZero: true,
                        },
                        border: {
                            display: true
                        },
                        grid: {
                            display: true,
                            color: 'rgb(17, 24, 39)'
                        }
                    },
                    x: {
                        ticks: {
                            color: 'rgb(17, 24, 39)',
                            beginAtZero: true,
                        },
                        border: {
                            display: true
                        },
                        grid: {
                            display: true,
                            color: 'rgb(120, 120, 120)'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        labels: {
                            color: 'rgb(255, 255, 255)',
                        }
                    },
                    subtitle: {
                        display: true,
                        text: 'Note: Monthly report on the total number of posts each month',
                        color: 'rgb(17, 24, 39)',
                        font: {
                            size: 14
                        }
                    }
                }
            }
        });

        const pointChartCtx = document.getElementById("point-chart");

        new Chart(pointChartCtx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: "# Of Articles",
                    data: data,
                    borderColor: 'rgb(17, 24, 39)',
                    pointStyle: 'cirlce',
                    fill: false,
                    pointRadius: 10,
                    pointHoverRadius: 15,
                    tension: 0.1
                }],
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        ticks: {
                            color: 'rgb(17, 24, 39)',
                            beginAtZero: true,
                        },
                        border: {
                            display: true
                        },
                        grid: {
                            display: true,
                            color: 'rgb(17, 24, 39)'
                        }
                    },
                    x: {
                        ticks: {
                            color: 'rgb(17, 24, 39)',
                            beginAtZero: true,
                        },
                        border: {
                            display: true
                        },
                        grid: {
                            display: true,
                            color: 'rgb(120, 120, 120)'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        labels: {
                            color: 'rgb(17, 24, 39)',
                        }
                    },
                    subtitle: {
                        display: true,
                        text: 'Note: Monthly report on the total number of posts each month',
                        color: 'rgb(17, 24, 39)',
                        font: {
                            size: 14
                        }
                    }
                }
            }
        })
    </script>
</body>
</html>
