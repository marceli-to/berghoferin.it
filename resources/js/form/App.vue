<template>
  <form>
    <template v-if="isSent">
      Vielen Dank für Ihre Anfrage. Wir werden diese bearbeiten und melden uns bei Ihnen.
    </template>
    <template v-else>
      <div class="grid grid-cols-16 gap-16">
        <div class="col-span-full md:col-span-6 md:col-start-2 xl:col-span-3 xl:col-start-2">
          <div class="mb-80">
            <heading-two>{{ __('Reisezeitraum') }}</heading-two>
            <VueDatePicker 
              v-model="form.dates" 
              inline
              range
              auto-apply
              :min-date="new Date()"
              :enable-time-picker="false"
              month-name-format="long"
              :locale="_getLocale()">
              <template #arrow-left>
                <icon-chevron-left />
              </template>
              <template #arrow-right>
                <icon-chevron-right />
              </template>
            </VueDatePicker>
          </div>
          <div class="mb-80">
            <heading-two>{{ __('Suiten') }}</heading-two>
            <form-group class="mb-16">
              <form-label>{{ __('Anzahl Suiten') }}</form-label>
              <div class="flex items-center">
                <button-counter @decrement=" decrementCounter('number_suites')" :action="'decrement'">
                  <icon-minus />
                </button-counter>
                <form-input 
                  type="number" 
                  class="mx-16 pt-2 border-l border-t border-r !border-midnight-300 w-32 !h-32 text-center" 
                  min="0"
                  v-model="form.number_suites"
                  @blur="validateCounter('number_suites')">
                </form-input>
                <button-counter @increment=" incrementCounter('number_suites')" :action="'increment'">
                  <icon-plus />
                </button-counter>
              </div>
            </form-group>
            <form-group>
              <form-label>{{ __('Personen') }}</form-label>
              <div class="flex items-center">
                <button-counter @decrement=" decrementCounter('number_guests')" :action="'decrement'">
                  <icon-minus />
                </button-counter>
                <form-input 
                  type="number" 
                  class="mx-16 pt-1 border-l border-t border-r !border-midnight-300 w-32 !h-32 text-center" 
                  min="0"
                  v-model="form.number_guests"
                  @blur="validateCounter('number_guests')">
                </form-input>
                <button-counter @increment=" incrementCounter('number_guests')" :action="'increment'">
                  <icon-plus />
                </button-counter>
              </div>
            </form-group>
          </div>
          <div class="mb-80 md:mb-0">
            <heading-two>{{ __('Bevorzugter Suitentyp') }}</heading-two>
            <form-group class="mb-16">
              <form-label>{{ __('Freunde-Suite') }}</form-label>
              <a href="" 
                @click.prevent="selectType('friends-suite')"
                :class="[form.suite_type == 'friends-suite' ? 'text-midnight-500' : 'text-midnight-300', 'flex items-center justify-center w-32 h-32 border border-midnight-300 text-center']">
                <icon-cross />
              </a>
            </form-group>
            <form-group class="mb-16">
              <form-label>{{ __('Gäste-Suite') }}</form-label>
              <a href="" 
                @click.prevent="selectType('guest-suite')"
                :class="[form.suite_type == 'guest-suite' ? 'text-midnight-500' : 'text-midnight-300', 'flex items-center justify-center w-32 h-32 border border-midnight-300 text-center']">
                <icon-cross />
              </a>
            </form-group>
            <form-group class="mb-16">
              <form-label>{{ __('Chamber-Suite') }}</form-label>
              <a href="" 
                @click.prevent="selectType('chamber-suite')"
                :class="[form.suite_type == 'chamber-suite' ? 'text-midnight-500' : 'text-midnight-300', 'flex items-center justify-center w-32 h-32 border border-midnight-300 text-center']">
                <icon-cross />
              </a>
            </form-group>
            <form-group class="mb-16">
              <form-label>{{ __('Master-Suite') }}</form-label>
              <a href="" 
                @click.prevent="selectType('master-suite')"
                :class="[form.suite_type == 'master-suite' ? 'text-midnight-500' : 'text-midnight-300', 'flex items-center justify-center w-32 h-32 border border-midnight-300 text-center']">
                <icon-cross />
              </a>
            </form-group>
          </div>
        </div>
        <div class="col-span-full md:col-span-6 md:col-start-10 xl:col-span-6 xl:col-start-6">
          <heading-two class="flex justify-between md:mb-48 md:relative xl:mb-20">
            {{ __('Persönliche Daten') }} 
            <div class="text-xs normal-case md:absolute md:top-48 xl:relative xl:top-0">
              * {{ __('Pflichtfelder') }}
            </div>
          </heading-two>
          <form-group :error="errors.salutation ? true : false" class="mb-8 grid grid-cols-6">
            <form-label class="col-span-2 hidden xl:block">{{ __('Anrede') }} *</form-label>
            <form-input 
              type="text" 
              class="col-span-6 xl:col-span-4" 
              v-model="form.salutation" 
              :placeholder="`${__('Anrede')} *`"
              @blur="validateField('salutation')"
              @focus="removeError('salutation')">
            </form-input>
          </form-group>
          <form-group :error="errors.firstname ? true : false" class="mb-8 grid grid-cols-6">
            <form-label class="col-span-2 hidden xl:block">{{ __('Vorname') }} *</form-label>
            <form-input 
              type="text" 
              class="col-span-6 xl:col-span-4" 
              v-model="form.firstname" 
              :placeholder="`${__('Vorname')} *`"
              @blur="validateField('firstname')"
              @focus="removeError('firstname')">
            </form-input>
          </form-group>
          <form-group :error="errors.name ? true : false" class="mb-8 grid grid-cols-6">
            <form-label class="col-span-2 hidden xl:block">{{ __('Name') }} *</form-label>
            <form-input 
              type="text" 
              class="col-span-6 xl:col-span-4" 
              v-model="form.name" 
              :placeholder="`${__('Name')} *`"
              @blur="validateField('name')"
              @focus="removeError('name')">
            </form-input>
          </form-group>
          <form-group :error="errors.street ? true : false" class="mb-8 grid grid-cols-6">
            <form-label class="col-span-2 hidden xl:block">{{ __('Strasse') }} *</form-label>
            <form-input 
              type="text" 
              class="col-span-6 xl:col-span-4" 
              v-model="form.street" 
              :placeholder="`${__('Strasse')} *`"
              @blur="validateField('street')"
              @focus="removeError('street')">
            </form-input>
          </form-group>
          <form-group class="mb-8 grid grid-cols-6">
            <form-label class="col-span-2 hidden xl:block">{{ __('Hausnummer') }}</form-label>
            <form-input 
              type="text" 
              class="col-span-6 xl:col-span-4" 
              v-model="form.street_number" 
              :placeholder="__('Hausnummer')">
            </form-input>
          </form-group>
          <form-group :error="errors.zip ? true : false" class="mb-8 grid grid-cols-6">
            <form-label class="col-span-2 hidden xl:block">{{ __('Postleitzahl') }} *</form-label>
            <form-input 
              type="text" 
              class="col-span-6 xl:col-span-4" 
              v-model="form.zip" 
              :placeholder="`${__('Postleitzahl')} *`"
              @blur="validateField('zip')"
              @focus="removeError('zip')">
            </form-input>
          </form-group>
          <form-group :error="errors.city ? true : false" class="mb-8 grid grid-cols-6">
            <form-label class="col-span-2 hidden xl:block">{{ __('Ort') }} *</form-label>
            <form-input 
              type="text" 
              class="col-span-6 xl:col-span-4" 
              v-model="form.city" 
              :placeholder="`${__('Ort')} *`"
              @blur="validateField('city')"
              @focus="removeError('city')">
            </form-input>
          </form-group>
          <form-group :error="errors.country ? true : false" class="mb-8 grid grid-cols-6">
            <form-label class="col-span-2 hidden xl:block">{{ __('Land') }} *</form-label>
            <form-input 
              type="text" 
              class="col-span-6 xl:col-span-4" 
              v-model="form.country" 
              :placeholder="`${__('Land')} *`"
              @blur="validateField('country')"
              @focus="removeError('country')">
            </form-input>
          </form-group>
          <form-group :error="errors.email ? true : false" class="mb-8 grid grid-cols-6">
            <form-label class="col-span-2 hidden xl:block">{{ __('E-Mail') }} *</form-label>
            <form-input 
              type="email" 
              class="col-span-6 xl:col-span-4" 
              v-model="form.email" 
              :placeholder="`${__('E-Mail')} *`"
              @blur="validateEmail()"
              @focus="removeError('email')">
            </form-input>
          </form-group>
          <form-group :error="errors.phone ? true : false" class="mb-8 grid grid-cols-6">
            <form-label class="col-span-2 hidden xl:block">{{ __('Telefon') }} *</form-label>
            <form-input 
              type="text" 
              class="col-span-6 xl:col-span-4" 
              v-model="form.phone" 
              :placeholder="`${__('Telefon')} *`"
              @blur="validateField('phone')"
              @focus="removeError('phone')">
            </form-input>
          </form-group>

          <div class="mt-80 mb-80 md:mb-0">
            <heading-two>{{ __('Anmerkungen') }}</heading-two>
            <form-group>
              <form-textarea 
                name="message"
                v-model="form.message" 
                class="min-h-[80px] md:min-h-[200px]"
                :placeholder="__('Anmerkungen')">
              </form-textarea>
            </form-group>
          </div>
        </div>
        <div class="col-span-full md:col-span-6 md:col-start-2 xl:col-span-3 xl:col-start-13" v-if="isDirty">
          <heading-two>{{ __('Zusammenfassung') }}</heading-two>
          <form-group class="border-b border-midnight-300 mb-8 h-36" v-if="arrivalDate">
            <form-label>{{ __('Anreise') }}</form-label>
            <div>{{ arrivalDate }}</div>
          </form-group>
          <form-group class="border-b border-midnight-300 mb-8 h-36" v-if="departureDate">
            <form-label>{{ __('Abreise') }}</form-label>
            <div>{{ departureDate }}</div>
          </form-group>
          <form-group class="border-b border-midnight-300 mb-8 h-36" v-if="form.number_suites > 0">
            <form-label>{{ __('Anzahl Suiten') }}</form-label>
            <div>{{ form.number_suites }}</div>
          </form-group>
          <form-group class="border-b border-midnight-300 mb-8 h-36" v-if="form.number_guests > 0">
            <form-label>{{ __('Personen') }}</form-label>
            <div>{{ form.number_guests }}</div>
          </form-group>
          <form-group class="border-b border-midnight-300 mb-8 h-36" v-if="form.suite_type">
            <form-label>{{ __('Suitentyp') }}</form-label>
            <div>{{ __(form.suite_type) }}</div>
          </form-group>
          <form-group class="mt-40">
            <form-checkbox :id="'privacy-statement'" v-model="form.privacy_statement" @change="toggle('privacy_statement')">
              <template v-slot:label>
                {{__('Hiermit stimme ich der Datenschutzerklärung zu.') }}
              </template>
            </form-checkbox>
          </form-group>
          <form-group class="mt-40">
            <form-checkbox :id="'newsletter'" v-model="form.newsletter" @change="toggle('newsletter')">
              <template v-slot:label>
                {{ __('Ich bin an Mitteilungen und Neuigkeiten interessiert.') }}
              </template>
            </form-checkbox>
          </form-group>
          <form-group class="mt-40">
            <button 
              :class="[isValid ? 'border-midnight-500 text-midnight-500' : 'border-midnight-300 text-midnight-300 pointer-events-none select-none', 'py-12 border-t border-b leading-none flex items-center w-full text-left']"
              @click.prevent="submit()">
              <icon-chevron-right :class="[isValid ? 'text-black' : 'text-midnight-400', '-mt-1 mr-8']" />
              {{ __('Unverbindlich anfragen') }}
            </button>
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
import FormCheckbox from '@/form/components/form/Checkbox.vue';
import ButtonCounter from '@/form/components/form/ButtonCounter.vue';
import FormTextarea from '@/form/components/form/Textarea.vue';
import HeadingTwo from '@/form/components/headings/h2.vue';
import IconChevronLeft from '@/form/icons/ChevronLeft.vue';
import IconChevronRight from '@/form/icons/ChevronRight.vue';
import IconMinus from '@/form/icons/Minus.vue';
import IconPlus from '@/form/icons/Plus.vue';
import IconCross from '@/form/icons/Cross.vue';
import i18n from "@/form/mixins/i18n";

export default {

  components: {
    FormGroup,
    FormLabel,
    FormInput,
    FormTextarea,
    FormCheckbox,
    ButtonCounter,
    HeadingTwo,
    IconChevronLeft,
    IconChevronRight,
    IconMinus,
    IconPlus,
    IconCross
  },

  mixins: [i18n],

  data() {

    return {

      form: {
        number_suites: 0,
        number_guests: 0,
        suite_type: null,
        salutation: null,
        name: null,
        firstname: null,
        street: null,
        street_number: null,
        zip: null,
        city: null,
        country: null,
        phone: null,
        email: null,
        message: null,
        arrival_date: null,
        departure_date: null,
        dates: {},
        newsletter: 0,
        privacy_statement: 0,
      },

      errors: {
        salutation: false,
        firstname: false,
        name: false,
        street: false,
        zip: false,
        city: false,
        country: false,
        phone: false,
        email: false
      },

      routes: {
        store: '/api/inquiry'
      },

      isSent: false,
    }
  },

  methods: {

    submit() {
      NProgress.start();
      this.isSent = false;
      this.form.arrival_date = this.arrivalDate;
      this.form.departure_date = this.departureDate; 

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

    incrementCounter(field) {
      this.form[field]++;
    },

    decrementCounter(field) {
      if (this.form[field] > 0) {
        this.form[field]--;
      }
    },

    selectType(type) {
      this.form.suite_type = type;
    },

    toggle(field) {
      this.form[field] = this.form[field] == 0 ? 1 : 0;
    }, 

    validateEmail() {
      if (this.form.email === null || this.form.email === '') {
        this.errors.email = true;
        return false;
      }
      const rgx = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!rgx.test(this.form.email)) {
        this.errors.email = true;
        return false;
      }
      return true;
    },

    validateField(field) {
      if (this.form[field] === null || this.form[field] === '') {
        this.errors[field] = true;
      } 
      else {
        this.errors[field] = false;
      }
    },

    validateCounter(field) {
      if (this.form[field] < 0) {
        this.form[field] = 0;
      }
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
        country: null,
        phone: null,
        email: null,
        message: null,
        arrival_date: null,
        departure_date: null,
        dates: {},
        number_guests: 0,
        number_suites: 0,
        suite_type: null,
      };
      this.errors = {};
    },

    formatedDate(date) {
      if (date) {
        return date.toLocaleDateString('de-DE', {day: '2-digit', month: '2-digit', year: 'numeric'});
      }
      return null
    }
  },

  computed: {

    isDirty() {
      if (
          this.form.dates[0] || 
          this.form.dates[1] ||
          this.form.number_suites > 0 ||
          this.form.number_guests > 0 ||
          this.form.suite_type
        ) {
        return true;
      }
      return false;
    },

    isValid() { 
      if (
        this.form.number_suites > 0 &&
        this.form.number_guests > 0 &&
        this.form.suite_type &&
        this.form.salutation &&
        this.form.name &&
        this.form.firstname &&
        this.form.street &&
        this.form.zip &&
        this.form.city &&
        this.form.country &&
        this.form.phone &&
        this.form.privacy_statement &&
        this.validateEmail()
        ) {
        return true;
      }
      return false;
    },

    arrivalDate() {
      return this.formatedDate(this.form.dates[0]);
    },

    departureDate() {
      return this.formatedDate(this.form.dates[1]);
    },
  },
}
</script>
