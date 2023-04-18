<template>
  <form>
    <template v-if="isSent">
      Vielen Dank für Ihre Anfrage. Wir werden diese bearbeiten und melden uns bei Ihnen.
    </template>
    <template v-else>

      <div class="grid grid-cols-16 gap-48">

        <div class="col-span-4">
          <div class="mb-48">
            <heading-three>Reisezeitraum</heading-three>
            <VDatePicker borderless transparent expanded :min-date="new Date()" v-model.range="form.dates" mode="date" class="vdp" />
          </div>
          <div class="mb-48">
            <heading-three>Suiten</heading-three>
            <form-group>
              <form-label>Anzahl Suiten</form-label>
              <div class="flex items-center">
                <a href="" @click.prevent="decrementCounter('number_suites')" class="block w-24 h-24 border border-gray-200 text-center">-</a>
                <form-input 
                  type="number" 
                  class="mx-8" 
                  min="0"
                  v-model="form.number_suites"
                  @blur="validateCounter('number_suites')">
                </form-input>
                <a href="" @click.prevent="incrementCounter('number_suites')" class="block w-24 h-24 border border-gray-200 text-center">+</a>
              </div>
            </form-group>
            <form-group>
              <form-label>Anzahl Personen</form-label>
              <div class="flex items-center">
                <a href="" @click.prevent="decrementCounter('number_guests')" class="block w-24 h-24 border border-gray-200 text-center">-</a>
                <form-input 
                  type="number" 
                  class="mx-8" 
                  min="0"
                  v-model="form.number_guests"
                  @blur="validateCounter('number_guests')">
                </form-input>
                <a href="" @click.prevent="incrementCounter('number_guests')" class="block w-24 h-24 border border-gray-200 text-center">+</a>
              </div>
            </form-group>
          </div>
        </div>
        <div class="col-span-4">
          <heading-three>Persönliche Daten</heading-three>
          <form-group :error="errors.name ? true : false">
            <form-label>Name *</form-label>
            <form-input 
              type="text" 
              class="" 
              v-model="form.name" 
              placeholder="Name"
              @focus="removeError('name')">
            </form-input>
          </form-group>
        </div>
        <div class="col-span-4">
          <heading-three>Zusammenfassung</heading-three>
          <form-group cssClass="border-b pb-4 mb-8 border-gray-200" v-if="formattedStartDate">
            <form-label>Anreise</form-label>
            <div>{{ formattedStartDate }}</div>
          </form-group>
          <form-group cssClass="border-b pb-4 border-gray-200" v-if="formattedEndDate">
            <form-label>Abreise</form-label>
            <div>{{ formattedEndDate }}</div>
          </form-group>
          <form-group :cssClass="'mt-48'">
            <button @click.prevent="submit()">Senden</button>
          </form-group>
        </div>
      </div>

    </template>
  </form>
</template>
<script>
import NProgress from 'nprogress';
import FormGroup from '@/form/components/form/Group.vue';
import FormLabel from '@/form/components/form/Label.vue';
import FormInput from '@/form/components/form/Input.vue';
import HeadingThree from '@/form/components/headings/h3.vue';

export default {

  components: {
    FormGroup,
    FormLabel,
    FormInput,
    HeadingThree
  },

  data() {
    return {
      form: {
        number_suites: 0,
        number_guests: 0,
        name: null,
        firstname: null,
        street: null,
        street_number: null,
        zip: null,
        city: null,
        phone: null,
        email: null,
        dates: {
          start: null,
          end: null,
        },
      },

      errors: {
        name: true,
        firstname: null,
        phone: null,
        email: null
      },



      routes: {
        store: '/api/form-data'
      },

      isSent: false
    }
  },

  mounted() {
  },

  methods: {
    submit() {
      NProgress.start();
      this.isSent = false;
      this.axios.post(this.routes.store, this.form).then(response => {
        NProgress.done();
        this.reset();
        this.isSent = true;
      })
      .catch(error => {
        NProgress.done();
        this.handleValidationErrors(error.response.data);
      });
    },

    handleValidationErrors(data) {
      let errors = [];
      for (let key in data.errors) {
        errors[data.errors[key][0]['field']] = data.errors[key][0]['error'];
      }
      this.errors = errors;
    },

    removeError(field) {
      this.errors[field] = null;
    },

    reset() {
      this.form = {
        name: null,
        firstname: null,
        street: null,
        street_number: null,
        zip: null,
        city: null,
        phone: null,
        email: null
      };
      this.errors = {};
    },

    validateCounter(field) {
      if (this.form[field] < 0) {
        this.form[field] = 0;
      }
    },

    incrementCounter(field) {
      this.form[field]++;
    },

    decrementCounter(field) {
      if (this.form[field] > 0) {
        this.form[field]--;
      }
    }
  },
  computed: {
    formattedStartDate() {
      if (this.form.dates.start) {
        return this.form.dates.start.toLocaleDateString('de-DE', {day: '2-digit', month: '2-digit', year: 'numeric'});
      }
    },
    formattedEndDate() {
      if (this.form.dates.end) {
        return this.form.dates.end.toLocaleDateString('de-DE', {day: '2-digit', month: '2-digit', year: 'numeric'});
      }
    },
  },
}
</script>
