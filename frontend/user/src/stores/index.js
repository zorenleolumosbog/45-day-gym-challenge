import { defineStore } from 'pinia'

export const userToken = defineStore('token', {
  state: () => ({
    token: null
  }),
  actions: {
    setToken(token) {
      this.token = token
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
      gymExperience: 'less than 12 months',
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
    setGymExperience(gymExperience) {
      this.profile.gymExperience = gymExperience;
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