import { defineStore } from 'pinia'

export const userAuth = defineStore('auth', {
  state: () => ({
    userId: localStorage.getItem("userId"),
    accessToken: localStorage.getItem("accessToken")
  }),
  actions: {
    setUserId(userId) {
      this.userId = userId
    },
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