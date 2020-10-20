
<template>
    <panel-item :field="field">
        <p slot="value" v-for="(val,key) in field.value" >
            {{key}} : {{val}}
        </p>
    </panel-item>
</template>

<script>
export default {
    inheritAttrs: false,
    props: ['field'],
};
</script>
