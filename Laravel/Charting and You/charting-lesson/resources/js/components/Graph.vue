<template>
    <div>
        <canvas width="600" height="400" ref="canvas"></canvas>
        <div class="legend" v-html="legend"></div>
    </div>
</template>

<script>
    import Chart from 'chart.js';

    export default {
        name: 'Graph',
        props: ['labels', 'values'],
        data() {
            return {
                legend: null,
            };
        },
        mounted() {
            const chart = new Chart(this.$refs.canvas.getContext('2d'), {
                type: 'line',
                data: {
                    labels: this.labels,
                    datasets: [
                        {
                            label: 'Monthly Points',
                            borderColor: 'green',
                            data: this.values,
                        },
                        {
                            label: 'Other Points',
                            borderColor: 'red',
                            data: [2, 50, 21],
                        },
                    ],
                },
                options: {},
            });

            this.legend = chart.generateLegend();
        },
    };
</script>

<style scoped>
    .legend {
        width: 10px;
        height: 10px;
        display: inline-block;
        margin-right: 10px;
    }
</style>
