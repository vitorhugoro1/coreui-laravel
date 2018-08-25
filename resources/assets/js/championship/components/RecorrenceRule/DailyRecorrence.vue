<template>
    <div>
        <div class="form-group">
            <label for="every">Every</label>
            <v-select placeholder="Every..." inputId="every" :options="every_days"></v-select>
        </div>
        <div class="form-group">
            <label for="at_time">At Time</label>
            <input type="checkbox" v-model="at_time" id="at_time" value="same"> In Same Time <br>
            <input type="checkbox" v-model="at_time" id="at_time" value="different"> A Different Time <br>
            <div v-if="at_time == 'same'">
                {{ parentTime }}
            </div>
        </div>
        <div class="form-group">
            <label for="series_end">Series End</label>
            
        </div>
    </div>
</template>

<script>
export default {
    name: 'daily-recorrence',
    data() {
        return {
            every_days: new Array(6),
            at_time: 'same',
            parentTime: 'Vem a hora do parent!'
        };
    }
}
</script>