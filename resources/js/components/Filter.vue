<template>
    <div>
        <h3 class="text-sm uppercase tracking-wide text-80 bg-30 p-3">
            {{ filter.name }}
        </h3>

        <div class="p-2">
            <span class="text-sm">Min</span>
            <input v-model="valuesArr.minValue"
                   type="number"
                   class="w-full form-control form-input form-input-bordered"
                   @change="handleChange">

            <span class="text-sm">Max</span>
            <input v-model="valuesArr.maxValue"
                   type="number"
                   class="w-full form-control form-input form-input-bordered"
                   @change="handleChange">
        </div>
    </div>
</template>

<script>

export default {

    mounted() {
        try {
            this.valuesArr = JSON.parse(this.value);
        } catch (e) {
            this.valuesArr = {
                minValue: '',
                maxValue: '',
            };
        }
    },

    data() {
        return {
            valuesArr: {},
        }
    },

    props: {
        resourceName: {
            type: String,
            required: true,
        },
        filterKey: {
            type: String,
            required: true,
        },
    },

    methods: {
        handleChange() {
            this.$store.commit(`${this.resourceName}/updateFilterState`, {
                filterClass: this.filterKey,
                value: JSON.stringify(this.valuesArr),
            })

            this.$emit('change')
        },
    },

    computed: {
        filter() {
            return this.$store.getters[`${this.resourceName}/getFilter`](
                this.filterKey
            )
        },

        value() {
            return this.filter.currentValue
        },
    },

    watch: {
        value: function(value) {
            if (!value) {
                this.valuesArr = {} ;
            }
        },
    }
}
</script>

<style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type=number] {
        -moz-appearance:textfield;
    }
</style>
