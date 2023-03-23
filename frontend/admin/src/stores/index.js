import { defineStore } from 'pinia'

export const userToken = defineStore('token', {
  state: () => ({
    accessToken: localStorage.getItem("access_token")
  }),
  actions: {
    setAccessToken(accessToken) {
      this.accessToken = accessToken
    }
  },
})

export const userLocale = defineStore('locale', {
  state: () => ({
    toLocaleDateNowString: '',
    toLocaleDateString: ''
  }),
  actions: {
    setToLocaleDateNowString() {
      const event = new Date();
      const dateString = event.toLocaleDateString(undefined, {  
          year: 'numeric', 
          month: 'short', 
          day: 'numeric' 
      })

      this.toLocaleDateNowString = dateString
    },
    setToLocaleDateString(currentDate) {
      const event = new Date(currentDate);
      const dateString = event.toLocaleDateString(undefined, {  
          year: 'numeric', 
          month: 'short', 
          day: 'numeric' 
      })
      
      this.toLocaleDateString = dateString;
    }
  },
})