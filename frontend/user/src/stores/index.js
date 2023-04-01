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

export const userProfile = defineStore('user', {
  state: () => ({
    user: null,
    profile: {
      gender: 'male',
      age: '',
      height: '',
      currentWeight: '',
      desiredWeightGoal: '',
      howActiveAreYou: 'i dont exercise',
      hoursOfSleepAtNight: '4-6 hours',
      stressLevelOutOf10: '1',
      medicationsSupplements: '',
      injuriesIllnesses: ''
    }
  }),
  actions: {
    setUser(user) {
      this.user = user;
    },
    setGender(gender) {
      this.profile.gender = gender;
    },
    setAge(age) {
      this.profile.age = age;
    },
    setHeight(height) {
      this.profile.height = height;
    },
    setCurrentWeight(currentWeight) {
      this.profile.currentWeight = currentWeight;
    },
    setDesiredWeightGoal(desiredWeightGoal) {
      this.profile.desiredWeightGoal = desiredWeightGoal;
    },
    setHowActiveAreYou(howActiveAreYou) {
      this.profile.howActiveAreYou = howActiveAreYou;
    },
    setHoursOfSleepAtNight(hoursOfSleepAtNight) {
      this.profile.hoursOfSleepAtNight = hoursOfSleepAtNight;
    },
    setStressLevelOutOf10(stressLevelOutOf10) {
      this.profile.stressLevelOutOf10 = stressLevelOutOf10;
    },
    setMedicationsSupplements(medicationsSupplements) {
      this.profile.medicationsSupplements = medicationsSupplements;
    },
    setInjuriesIllnesses(injuriesIllnesses) {
      this.profile.injuriesIllnesses = injuriesIllnesses;
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