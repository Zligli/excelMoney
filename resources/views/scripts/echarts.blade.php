<script>
    var theme = {
        color: [
            '#26B99A', '#34495E', '#BDC3C7', '#3498DB',
            '#9B59B6', '#8abb6f', '#759c6a', '#bfd3b7'
        ],

        title: {
            itemGap: 8,
            textStyle: {
                fontWeight: 'normal',
                color: '#73879C'
            }
        },

        dataRange: {
            color: ['#1f610a', '#97b58d']
        },

        toolbox: {
            color: ['#408829', '#408829', '#408829', '#408829']
        },

        tooltip: {
            backgroundColor: 'rgba(0,0,0,0.5)',
            axisPointer: {
                type: 'line',
                lineStyle: {
                    color: '#408829',
                    type: 'dashed'
                },
                crossStyle: {
                    color: '#408829'
                },
                shadowStyle: {
                    color: 'rgba(200,200,200,0.3)'
                }
            }
        },

        dataZoom: {
            dataBackgroundColor: '#eee',
            fillerColor: 'rgba(64,136,41,0.2)',
            handleColor: '#408829'
        },
        grid: {
            borderWidth: 0
        },

        categoryAxis: {
            axisLine: {
                lineStyle: {
                    color: '#408829'
                }
            },
            splitLine: {
                lineStyle: {
                    color: ['#eee']
                }
            }
        },

        valueAxis: {
            axisLine: {
                lineStyle: {
                    color: '#408829'
                }
            },
            splitArea: {
                show: true,
                areaStyle: {
                    color: ['rgba(250,250,250,0.1)', 'rgba(200,200,200,0.1)']
                }
            },
            splitLine: {
                lineStyle: {
                    color: ['#eee']
                }
            }
        },
        timeline: {
            lineStyle: {
                color: '#408829'
            },
            controlStyle: {
                normal: {color: '#408829'},
                emphasis: {color: '#408829'}
            }
        },

        k: {
            itemStyle: {
                normal: {
                    color: '#68a54a',
                    color0: '#a9cba2',
                    lineStyle: {
                        width: 1,
                        color: '#408829',
                        color0: '#86b379'
                    }
                }
            }
        },
        map: {
            itemStyle: {
                normal: {
                    areaStyle: {
                        color: '#ddd'
                    },
                    label: {
                        textStyle: {
                            color: '#c12e34'
                        }
                    }
                },
                emphasis: {
                    areaStyle: {
                        color: '#99d2dd'
                    },
                    label: {
                        textStyle: {
                            color: '#c12e34'
                        }
                    }
                }
            }
        },
        force: {
            itemStyle: {
                normal: {
                    linkStyle: {
                        strokeColor: '#408829'
                    }
                }
            }
        },
        chord: {
            padding: 4,
            itemStyle: {
                normal: {
                    lineStyle: {
                        width: 1,
                        color: 'rgba(128, 128, 128, 0.5)'
                    },
                    chordStyle: {
                        lineStyle: {
                            width: 1,
                            color: 'rgba(128, 128, 128, 0.5)'
                        }
                    }
                },
                emphasis: {
                    lineStyle: {
                        width: 1,
                        color: 'rgba(128, 128, 128, 0.5)'
                    },
                    chordStyle: {
                        lineStyle: {
                            width: 1,
                            color: 'rgba(128, 128, 128, 0.5)'
                        }
                    }
                }
            }
        },
        gauge: {
            startAngle: 225,
            endAngle: -45,
            axisLine: {
                show: true,
                lineStyle: {
                    color: [[0.2, '#86b379'], [0.8, '#68a54a'], [1, '#408829']],
                    width: 8
                }
            },
            axisTick: {
                splitNumber: 10,
                length: 12,
                lineStyle: {
                    color: 'auto'
                }
            },
            axisLabel: {
                textStyle: {
                    color: 'auto'
                }
            },
            splitLine: {
                length: 18,
                lineStyle: {
                    color: 'auto'
                }
            },
            pointer: {
                length: '90%',
                color: 'auto'
            },
            title: {
                textStyle: {
                    color: '#333'
                }
            },
            detail: {
                textStyle: {
                    color: 'auto'
                }
            }
        },
        textStyle: {
            fontFamily: 'Arial, Verdana, sans-serif'
        }
    };

//    Month main costs
    var echartMainCosts = echarts.init(document.getElementById('month-main-costs'), theme);
    var costs = {!! json_encode($costs) !!}

    series = [];
    $.each(costs.sums, function (index, value) {
        series.push({
            name: index,
            type: 'line',
            stack: 'sum',
            smooth: true,
            itemStyle: {
                normal: {
                    areaStyle: {
                        type: 'default'
                    }
                }
            },
            data: value
        })
    });
    echartMainCosts.setOption({
        title: {
            text: 'Mesecni pregled troskova',
            subtext: 'prethodnih 8 meseci'
        },
        tooltip: {
            trigger: 'item'
        },
        toolbox: {
            show: true,
            feature: {
                magicType: {
                    show: true,
                    title: {
                        line: 'Line',
                        bar: 'Bar',
                        stack: 'Stack',
                        tiled: 'Tiled'
                    },
                    type: ['line', 'bar', 'stack', 'tiled']
                },
                restore: {
                    show: true,
                    title: "Restore"
                },
                saveAsImage: {
                    show: true,
                    title: "Save Image"
                }
            }
        },
        calculable : true,
        xAxis: [{
            type: 'category',
            boundaryGap: false,
            data: costs.periods
        }],
        yAxis: [{
            type: 'value'
        }],
        series: series
    });


    //    Month main incomes
    var echartMainIncomes = echarts.init(document.getElementById('month-main-incomes'), theme);
    var incomes = {!! json_encode($incomes) !!}

            series = [];
    $.each(incomes.sums, function (index, value) {
        series.push({
            name: index,
            type: 'line',
            stack: 'sum',
            smooth: true,
            itemStyle: {
                normal: {
                    areaStyle: {
                        type: 'default'
                    }
                }
            },
            data: value
        })
    });
    echartMainIncomes.setOption({
        title: {
            text: 'Mesecni pregled prihoda',
            subtext: 'prethodnih 8 meseci'
        },
        tooltip: {
            trigger: 'item'
        },
        toolbox: {
            show: true,
            feature: {
                magicType: {
                    show: true,
                    title: {
                        line: 'Line',
                        bar: 'Bar',
                        stack: 'Stack',
                        tiled: 'Tiled'
                    },
                    type: ['line', 'bar', 'stack', 'tiled']
                },
                restore: {
                    show: true,
                    title: "Restore"
                },
                saveAsImage: {
                    show: true,
                    title: "Save Image"
                }
            }
        },
        calculable : true,
        xAxis: [{
            type: 'category',
            boundaryGap: false,
            data: incomes.periods
        }],
        yAxis: [{
            type: 'value'
        }],
        series: series
    });

    //    Month main savings
    var echartMainSavings = echarts.init(document.getElementById('month-savings'), theme);
    var savings = {!! json_encode($savings) !!}

            series = [];
    $.each(savings.sums, function (index, value) {
        series.push({
            name: index,
            type: 'line',
            stack: 'sum',
            smooth: true,
            itemStyle: {
                normal: {
                    areaStyle: {
                        type: 'default'
                    }
                }
            },
            data: value
        })
    });
    echartMainSavings.setOption({
        title: {
            text: 'Mesecni pregled stednje',
            subtext: 'prethodnih 8 meseci'
        },
        tooltip: {
            trigger: 'item'
        },
        toolbox: {
            show: true,
            feature: {
                magicType: {
                    show: true,
                    title: {
                        line: 'Line',
                        bar: 'Bar',
                        stack: 'Stack',
                        tiled: 'Tiled'
                    },
                    type: ['line', 'bar', 'stack', 'tiled']
                },
                restore: {
                    show: true,
                    title: "Restore"
                },
                saveAsImage: {
                    show: true,
                    title: "Save Image"
                }
            }
        },
        calculable : true,
        xAxis: [{
            type: 'category',
            boundaryGap: false,
            data: savings.periods
        }],
        yAxis: [{
            type: 'value'
        }],
        series: series
    });
</script>