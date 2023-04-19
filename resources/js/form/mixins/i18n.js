export default {
  
  data() {
    return {
      translations: {},
      fallback_locale: 'de',
    }
  },

  mounted() {
    this._getTranslations();
  },

  methods: {

    __(key) {
      if (this.translations[key]) {
        return this.translations[key];
      }
      return key;
    },

    _getLocale() {
      let ll = document.documentElement.lang ? document.documentElement.lang : 'de';
      return ll;
    },

    _getTranslations() {
      const locale = this._getLocale();
      this.axios.get(`/api/translations/${locale}`).then(response => {
        this.translations = JSON.parse(response.data);
      });
    },
  }
};