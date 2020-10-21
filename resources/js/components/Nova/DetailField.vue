
<template>
    <panel-item :field="field">
        <div slot="value" v-for="(val,key) in field.value" >
            <span class="flex-1 no-underline font-bold dim text-primary setting-field">
                {{key}}
            </span>
            <span class="flex-1 no-underline font-bold dim text-primary value-field">
                {{val}}
            </span>
        </div>
    </panel-item>
</template>

<script>
export default {
    inheritAttrs: false,
    props: ['field'],
};
</script>
