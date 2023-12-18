<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.head')
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
</head>
<body>
    <div class="min-h-screen bg-zinc-900">
        {{-- Navigation --}}
        @php
            $greetingWord = "";
            $recentTime = date("G");

            if ($recentTime > 0 && $recentTime < 24) {
                if ($recentTime >= 3 && $recentTime < 12) {
                    $greetingWord = "Good Morning";
                } else if ($recentTime >= 12 && $recentTime < 17) {
                    $greetingWord = "Good Afternoon";
                } else {
                    $greetingWord = "Good Evening";
                }
            } 
        @endphp
        <x-admin-navigation :greetingMessage="$greetingWord"/>
        {{-- Page Heading --}}
        <header class="bg-zinc-900">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <div name="header">
                    <h2 class="text-center font-bold text-2xl text-yellow-400 leading-tight">
                        {{ __('Dashboard') }}
                    </h2>
                </div>
            </div>
        </header>
        {{-- Flash Notification --}}
        @if (session()->has('success'))
            <div class="container mx-auto">
                <div class="flex items-center p-4 mb-4 text-base text-gray-50 border border-gray-50 rounded-lg bg-green-600" role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-bold">Success!</span> {{ session()->get("success") }}
                    </div>
                </div>
            </div>           
        @elseif (session()->has("error"))
            <div class="container mx-auto">
                <div class="flex items-center p-4 mb-4 text-base text-gray-50 border border-gray-50 rounded-lg bg-red-500" role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-bold">Not Permitted!</span> {{ session()->get("error") }}
                    </div>
                </div>  
            </div>  
        @endif
        {{-- Chart Content --}}
        <section>
            <div class="mx-auto py-4">
                <div class="grid grid-rows-1 grid-flow-col">
                    <div class="grid grid-cols-1 px-5 md:grid-cols-2 md:px-0">
                        {{-- Polar Chart --}}
                        <div class="pt-12 pb-8 drop-shadow-lg">
                            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                <div class="bg-yellow-400 overflow-hidden rounded-md shadow-lg">
                                    <div class="p-6 text-gray-900">
                                        <div class="text-center pb-4">
                                            <h3 class="text-lg font-bold text-gray-900">Bar Chart</h3>
                                        </div>
                                        <div class="w-full px-4 py-4">
                                            <canvas id="fourth-chart"></canvas>
                                        </div>
                                    </div>
                                </div>
        
                                {{-- Line chart --}}
                                <div class="grid grid-rows-1 grid-flow-col mt-5">
                                    <div class="grid grid-cols-1">
                                        <div class="pt-6 drop-shadow-lg">
                                            <div class="max-w-full">
                                                <div class="bg-yellow-400 overflow-hidden rounded-md shadow-lg">
                                                    <div class="p-6 text-gray-900">
                                                        <div class="text-center pb-4">
                                                            <h3 class="text-lg font-bold text-gray-900">Line Chart</h3>
                                                        </div>
                                                        <div class="w-full">
                                                            <canvas id="third-chart"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
        
                        {{-- Circle chart --}}
                        <div class="pt-12 pb-8 drop-shadow-lg">
                            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                <div class="max-h-full bg-yellow-400 overflow-hidden rounded-md shadow-lg">
                                    <div class="p-6 text-gray-900">
                                        <div class="text-center pb-4">
                                            <h3 class="text-lg font-bold text-gray-900">Circle Chart</h3>
                                        </div>
                                        <div class="w-full px-4 py-4">
                                            <canvas id="second-chart"></canvas>
                                        </div>
                                    </div>
                                </div>

                                {{-- Bar chart --}}
                                <div class="grid grid-rows-1 grid-flow-col mt-5">
                                    <div class="grid grid-cols-1">
                                        <div class="pt-6 drop-shadow-lg">
                                            <div class="max-w-full">
                                                <div class="bg-yellow-400 overflow-hidden rounded-md shadow-lg">
                                                    <div class="p-6 text-gray-900">
                                                        <div class="text-center pb-4">
                                                            <h3 class="text-lg font-bold text-gray-900">Polar Chart</h3>
                                                        </div>
                                                        <div class="w-full">
                                                            <canvas id="first-chart"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
        // Bar Chart
        const bar = document.getElementById('first-chart');

        new Chart(bar, {
            type: 'bar',
            data: {
                labels: {!! json_encode($labels) !!},
                datasets: [{
                    label: '# Of Posts',
                    data: {!! json_encode($data) !!},
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

        // Circle Chart
        const circle = document.getElementById('second-chart');

        new Chart(circle, {
            type: 'doughnut',
            data: {
                labels: {!! json_encode($labels) !!},
                datasets: [{
                    label: '# Of Posts',
                    data: {!! json_encode($data) !!},
                    backgroundColor: [
                        'rgb(234, 179, 8)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)'
                    ],
                    borderColor: 'rgb(17, 24, 39)',
                    hoverOffset: 4
                }]
            },
            options: {
                layout: {
                    padding: {
                        left: 10,
                        right: 10,
                        top: 0,
                        bottom: 0,
                    }
                },
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'right',
                        labels: {
                            color: 'rgb(17, 24, 39)',
                            usePointStyle: true
                        },
                        pointStyle: 'circle'
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

        // Line chart
        const line = document.getElementById('third-chart');

        new Chart(line, {
            type: 'line',
            data: {
                labels: {!! json_encode($labels) !!},
                datasets: [{
                    label: '# Of Posts',
                    data: {!! json_encode($data) !!},
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

        // Polar Chart
        const polar = document.getElementById('fourth-chart');

        new Chart(polar, {
            type: 'polarArea',
            data: {
                labels: {!! json_encode($labels) !!},
                datasets: [{
                    label: '# Of Posts',
                    data: {!! json_encode($data) !!},
                    backgroundColor: [
                        'rgba(234, 179, 8, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(255, 205, 86, 0.5)',
                        'rgba(201, 203, 207, 0.5)',
                        'rgba(54, 162, 235, 0.5)'
                    ],
                    borderColor: 'rgb(17, 24, 39)'
                }],
            },
            options: {
                layout: {
                    padding: {
                        left: 10,
                        right: 10,
                        top: 0,
                        bottom: 0,
                    }
                },
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'right',
                        labels: {
                            color: 'rgb(17, 24, 39)',
                            usePointStyle: true
                        },
                        pointStyle: 'circle'
                    },
                    subtitle: {
                        display: true,
                        text: 'Note: Monthly report on the total number of posts each month',
                        color: 'rgb(17, 24, 39)',
                        font: {
                            size: 14
                        },
                    },
                },
            },
        });
    </script>
</body>
</html>