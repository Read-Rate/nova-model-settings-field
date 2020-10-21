<template>
    <default-field :field="field">
        <template slot="field">
            <ul ref="novaitemslist" v-show="Object.keys(items).length !== 0" class="nova-items-field-input-items list-reset border border-40 py-2">
                <li
                    v-for="(item, index) in items"
                    :key="field.attribute + '.' + index"
                    class="px-4 py-2"
                >
                    <div class="nova-items-field-input-wrapper-item flex py-1">

                        <span
                            :value="index"
                            type="text"
                            :name="field.name + '['+ index +']'"
                            :class="{'border-danger': hasErrors(field.attribute + '.' + index)}"
                            class="flex-1 no-underline font-bold dim text-primary setting-field"
                        >{{index}}</span>
                        <input
                            :value="item"
                            type="text"
                            v-on:keyup="updateValue(index, $event)"
                            :name="field.name + '['+ index +']'"
                            autocomplete="new-password"
                            :class="{'border-danger': hasErrors(field.attribute + '.' + index)}"
                            class="flex-1 form-control form-input form-input-bordered value-field"
                        >
                        <span
                            @click="removeItem(index)"
                            style="font-size: 32px;"
                            class="ml-4 mr-2 font-thin cursor-pointer hover:font-normal"
                            v-html="'X'"
                        />
                    </div>
                </li>
            </ul>
            <div class="nova-items-field-input-wrapper flex border border-40 p-4">
                <input
                    v-model="newSetting"
                    type="text"
                    placeholder="Setting"
                    class="flex-1 form-control form-input form-input-bordered"
                    @keypress.enter.prevent="addItem"
                />
                <input
                    v-model="newValue"
                    type="text"
                    placeholder="Value"
                    class="flex-1 form-control form-input form-input-bordered"
                    @keypress.enter.prevent="addItem"
                />
                <a
                    @click="addItem"
                    v-html="'Add'"
                    class="btn btn-default btn-primary ml-3 cursor-pointer"
                />
            </div>

        </template>
    </default-field>
</template>

<script>
import Vue from 'vue';
import { FormField, HandlesValidationErrors } from 'laravel-nova';
export default {
    mixins: [FormField, HandlesValidationErrors],
    props: ['field'],
    data: function() {
        return {
            value: '',
            items: Object,
            newItem: '',
            newSetting: '',
            newValue: '',
            arrayErrors: [],
        };
    },
    methods: {
        setInitialValue() {
            if (typeof this.field.value === 'object' && Object.keys(this.field.value).length !== 0){
                this.value = this.field.value
                this.items = this.field.value

            }else{
               this.value = {}
               this.items = {}
            }
        },
        fill(formData) {
            formData.append(this.field.attribute, this.value || Object)
        },
        addItem() {
            const setting = this.newSetting.trim();
            const value = this.newValue.trim();
            if (setting && value) {
                this.$set(this.items, setting, value);
                this.newSetting = '';
                this.newValue = '';
            }
        },
        updateValue(index, event) {
            this.$set(this.items, index, event.target.value);
        },
        removeItem(index) {
            Vue.delete(this.items, index);
        },
        hasErrors(key) {
            return this.arrayErrors.hasOwnProperty(key);
        },
    },
    watch: {
        items: {
            handler: function(items) {
                this.value = JSON.stringify(items);
            },
            deep: true,
        },
        errors: {
            handler: function(errors) {
                if (errors.errors.hasOwnProperty(this.field.attribute)) {
                    this.arrayErrors = errors.errors[this.field.attribute][0];
                }
            },
            deep: true,
        },
    },
};
</script>
