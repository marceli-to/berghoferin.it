<template>
  <form>
    <template v-if="isSent">
      Vielen Dank für Ihre Anfrage. Wir werden diese bearbeiten und melden uns bei Ihnen.
    </template>
    <template v-else>

      <div class="grid grid-cols-16 gap-48">

        <div class="col-span-4 lg:col-span-3 lg:col-start-2">
          <div class="mb-48">
            <heading-three>Reisezeitraum</heading-three>
            <VueDatePicker 
              v-model="form.dates" 
              inline
              range
              auto-apply
              :min-date="new Date()"
              :enable-time-picker="false"
              month-name-format="long"
              locale="de">
            </VueDatePicker>
          </div>
          <div class="mb-48">
            <heading-three>Suiten</heading-three>
            <form-group>
              <form-label>Anzahl Suiten</form-label>
              <div class="flex items-center">
                <a href="" @click.prevent="decrementCounter('number_suites')" class="block w-24 xl:w-30 h-24 xl:h-30 border border-midnight-400 text-center">-</a>
                <form-input 
                  type="number" 
                  class="mx-8 border-l border-t border-r border-midnight-400 w-24 xl:w-30 h-24 xl:h-30 text-center" 
                  min="0"
                  v-model="form.number_suites"
                  @blur="validateCounter('number_suites')">
                </form-input>
                <a href="" @click.prevent="incrementCounter('number_suites')" class="block w-24 xl:w-30 h-24 xl:h-30 border border-midnight-400 text-center">+</a>
              </div>
            </form-group>
            <form-group>
              <form-label>Personen</form-label>
              <div class="flex items-center">
                <a href="" 
                  @click.prevent="decrementCounter('number_guests')" 
                  class="block w-24 xl:w-30 h-24 xl:h-30 border border-midnight-400 text-center">
                  -
                </a>
                <form-input 
                  type="number" 
                  class="mx-8 border-l border-t border-r border-midnight-400 w-24 xl:w-30 h-24 xl:h-30 text-center" 
                  min="0"
                  v-model="form.number_guests"
                  @blur="validateCounter('number_guests')">
                </form-input>
                <a href="" 
                  @click.prevent="incrementCounter('number_guests')" 
                  class="block w-24 xl:w-30 h-24 xl:h-30 border border-midnight-400 text-center">
                  +
                </a>
              </div>
            </form-group>

            <heading-three class="mt-48">Bevorzugter Suitentyp</heading-three>
            <form-group>
              <form-label>Freunde-Suite</form-label>
              <a href="" 
                @click.prevent="selectSuiteType('friends-suite')"
                :class="[form.suite_type == 'friends' ? 'text-gray-500' : 'text-gray-200', 'block w-24 h-24 border border-midnight-300 text-center']">
                x
              </a>
            </form-group>
            <form-group>
              <form-label>Gäste-Suite</form-label>
              <a href="" 
                @click.prevent="selectSuiteType('guest-suite')"
                :class="[form.suite_type == 'guest' ? 'text-gray-500' : 'text-gray-200', 'block w-24 h-24 border border-midnight-300 text-center']">
                x
              </a>
            </form-group>
            <form-group>
              <form-label>Chamber-Suite</form-label>
              <a href="" 
                @click.prevent="selectSuiteType('chamber-suite')"
                :class="[form.suite_type == 'chamber' ? 'text-gray-500' : 'text-gray-200', 'block w-24 h-24 border border-midnight-300 text-center']">
                x
              </a>
            </form-group>
            <form-group>
              <form-label>Master-Suite</form-label>
              <a href="" 
                @click.prevent="selectSuiteType('master-suite')"
                :class="[form.suite_type == 'master' ? 'text-gray-500' : 'text-gray-200', 'block w-24 h-24 border border-midnight-300 text-center']">
                x
              </a>
            </form-group>
          </div>
        </div>
        <div class="col-span-8 lg:col-span-6 lg:col-start-6">
          <heading-three>Persönliche Daten</heading-three>
          <form-group :error="errors.firstname ? true : false">
            <form-label>Vorname *</form-label>
            <form-input 
              type="text" 
              class="" 
              v-model="form.firstname" 
              placeholder="Vorname"
              @focus="removeError('firstname')">
            </form-input>
          </form-group>
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
          <form-group :error="errors.street ? true : false">
            <form-label>Strasse *</form-label>
            <form-input 
              type="text" 
              class="" 
              v-model="form.street" 
              placeholder="Strasse"
              @focus="removeError('street')">
            </form-input>
          </form-group>
          <form-group>
            <form-label>Hausnummer</form-label>
            <form-input 
              type="text" 
              class="" 
              v-model="form.street_number" 
              placeholder="Hausnummer">
            </form-input>
          </form-group>
          <form-group :error="errors.zip ? true : false">
            <form-label>Postleitzahl *</form-label>
            <form-input 
              type="text" 
              class="" 
              v-model="form.zip" 
              placeholder="Postleitzahl"
              @focus="removeError('zip')">
            </form-input>
          </form-group>
          <form-group :error="errors.city ? true : false">
            <form-label>Ort *</form-label>
            <form-input 
              type="text" 
              class="" 
              v-model="form.city" 
              placeholder="Ort"
              @focus="removeError('city')">
            </form-input>
          </form-group>
          <form-group :error="errors.email ? true : false">
            <form-label>E-Mail *</form-label>
            <form-input 
              type="email" 
              class="" 
              v-model="form.email" 
              placeholder="E-Mail"
              @focus="removeError('email')">
            </form-input>
          </form-group>
          <form-group :error="errors.phone ? true : false">
            <form-label>Telefon *</form-label>
            <form-input 
              type="text" 
              class="" 
              v-model="form.phone" 
              placeholder="Telefon"
              @focus="removeError('phone')">
            </form-input>
          </form-group>

          <heading-three>Anmerkungen</heading-three>
          <form-group>
            <form-textarea 
              name="message"
              v-model="form.message" 
              placeholder="Anmerkungen">
            </form-textarea>
          </form-group>
        </div>
        <div class="col-span-4 lg:col-span-3 lg:col-start-13">
          <heading-three>Zusammenfassung</heading-three>
          <form-group cssClass="border-b pb-4 mb-8 border-midnight-400" v-if="formattedStartDate">
            <form-label>Anreise</form-label>
            <div>{{ formattedStartDate }}</div>
          </form-group>
          <form-group cssClass="border-b pb-4 mb-8 border-midnight-400" v-if="formattedEndDate">
            <form-label>Abreise</form-label>
            <div>{{ formattedEndDate }}</div>
          </form-group>
          <form-group cssClass="border-b pb-4 mb-8 border-midnight-400" v-if="form.number_suites > 0">
            <form-label>Anzahl Suiten</form-label>
            <div>{{ form.number_suites }}</div>
          </form-group>
          <form-group cssClass="border-b pb-4 mb-8 border-midnight-400" v-if="form.number_guests > 0">
            <form-label>Personen</form-label>
            <div>{{ form.number_guests }}</div>
          </form-group>
          <form-group cssClass="border-b pb-4 mb-8 border-midnight-400" v-if="form.suite_type">
            <form-label>Suitentyp</form-label>
            <div>{{ __(form.suite_type) }}</div>
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
import FormTextarea from '@/form/components/form/Textarea.vue';
import HeadingThree from '@/form/components/headings/h3.vue';
import i18n from "@/form/mixins/i18n";

export default {

  components: {
    FormGroup,
    FormLabel,
    FormInput,
    FormTextarea,
    HeadingThree
  },

  mixins: [i18n],

  data() {
    return {
      form: {
        number_suites: 0,
        number_guests: 0,
        suite_type: null,
        salutation: 'Mr.',
        name: null,
        firstname: null,
        street: null,
        street_number: null,
        zip: null,
        city: null,
        country: 'Switzerland',
        phone: null,
        email: null,
        message: null,
        arrival_date: null,
        departure_date: null,
        dates: {},
      },

      errors: {
        name: false,
        firstname: false,
        phone: false,
        email: false
      },

      routes: {
        store: '/api/inquiry'
      },

      i18n: {

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

      // Map dates
      this.form.arrival_date = this.form.dates[0].toLocaleDateString('de-DE', {day: '2-digit', month: '2-digit', year: 'numeric'}); 
      this.form.departure_date = this.form.dates[1].toLocaleDateString('de-DE', {day: '2-digit', month: '2-digit', year: 'numeric'});

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
      console.log(data);
      // let errors = [];
      // for (let key in data.errors) {
      //   errors[data.errors[key][0]['field']] = data.errors[key][0]['error'];
      // }
      // this.errors = errors;
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
    },

    selectSuiteType(type) {
      this.form.suite_type = type;
    },
  },

  computed: {
    formattedStartDate() {
      if (this.form.dates[0]) {
        return this.form.dates[0].toLocaleDateString('de-DE', {day: '2-digit', month: '2-digit', year: 'numeric'});
      }
    },
    formattedEndDate() {
      if (this.form.dates[1]) {
        return this.form.dates[1].toLocaleDateString('de-DE', {day: '2-digit', month: '2-digit', year: 'numeric'});
      }
    },
  },
}
</script>
