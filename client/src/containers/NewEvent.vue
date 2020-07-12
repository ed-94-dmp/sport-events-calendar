<template>
  <div class="new-event">
    <div class="form-option">
      <label for="sport">Sport: </label>
      <select id="sport" v-model="sportId">
        <option v-for="sport in sportsList" :value="sport.id">
          {{sport.name}}
        </option>
      </select>
    </div>

    <div class="form-option">
      <label for="location">Location: </label>
      <select id="location" v-model="locationId">
        <option v-for="location in locationsList" :value="location.id">
          {{location.name}}, {{location.city.name}}, {{location.city.state.name}}, {{location.city.state.country.name}}
        </option>
      </select>
    </div>

    <div class="form-option">
      <label for="competition">Competition: </label>
      <select id="competition" v-model="competitionId">
        <option v-for="competition in competitionsList" :value="competition.id">
          {{competition.name}}
        </option>
      </select>
    </div>

    <div class="form-option">
      <label for="competitor-home">Home Competitor: </label>
      <select id="competitor-home" v-model="competitor1Id">
        <option v-for="competitor in competitorsList" :value="competitor.id">
          {{competitor.name}}
        </option>
      </select>
    </div>

    <div class="form-option">
      <label for="competitor-away">Away Competitor: </label>
      <select id="competitor-away" v-model="competitor2Id">
        <option v-for="competitor in competitorsList" :value="competitor.id">
          {{competitor.name}}
        </option>
      </select>
    </div>

    <div class="form-option">
      <label for="status">Status: </label>
      <select id="status" v-model="status">
        <option v-for="status in ['postponed', 'scheduled', 'canceled', 'to be announced']" :value="status">
          {{status}}
        </option>
      </select>
    </div>

    <div class="form-option">
      <label for="datetime">Date & time: </label>
      <input type="datetime-local" id="datetime" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}T[0-9]{2}:[0-9]{2}"
             v-model="datetime">
    </div>

    <Btn @clicked="saveEvent">Save</Btn>

    <Error v-if="error">{{error.message}}</Error>
  </div>
</template>

<script>
  import Events from "./Events/Events";
  import {SERVER} from "../App";
  import Btn from "../components/Btn";
  import Error from "../components/Error";

  export default {
    name: 'index',
    components: {Error, Btn, Events},
    created() {
      this.getSports();
      this.getLocations();
      this.getCompetitions();
      this.getCompetitors();
    },
    data() {
      return {
        sportId: null,
        locationId: null,
        competitionId: null,
        competitor1Id: null,
        competitor2Id: null,
        status: null,
        datetime: null,

        sportsList: [],
        locationsList: [],
        competitionsList: [],
        competitorsList: [],

        error: null,
      }
    },
    computed: {
      params: function () {
        return {
          sportId: this.sportId,
          locationId: this.locationId,
          competitionId: this.competitionId,
          competitor1Id: this.competitor1Id,
          competitor2Id: this.competitor2Id,
          status: this.status,
          datetime: this.datetime,
        }
      }
    },
    methods: {
      getSports() {
        SERVER.get('/v1/sports')
          .then((response) => {
            const {data: sportsList} = response

            this.sportsList = sportsList;
          })
          .catch((error) => this.error = error)
      },
      getLocations() {
        SERVER.get('/v1/locations')
          .then((response) => {
            const {data: locationsList} = response

            this.locationsList = locationsList;
          })
          .catch((error) => this.error = error)
      },
      getCompetitions() {
        SERVER.get('/v1/competitions')
          .then((response) => {
            const {data: competitionsList} = response

            this.competitionsList = competitionsList;
          })
          .catch((error) => this.error = error)
      },
      getCompetitors() {
        SERVER.get('/v1/competitors')
          .then((response) => {
            const {data: competitorsList} = response

            this.competitorsList = competitorsList;
          })
          .catch((error) => this.error = error)
      },
      saveEvent() {
        SERVER.post('/v1/events', this.params)
          .then((response) => {
            console.log(response);
          })
          .catch((error) => this.error = error);
      }
    }
  }
</script>

<style scoped>
  .new-event {
    font-size: 1rem;
    display: grid;
    grid-gap: 2rem;
    grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
  }

  .form-option {
    display: flex;
    align-items: center;
  }

  .form-option label {
    margin-right: 1rem;
  }

  select, input {
    flex-grow: 1;
  }
</style>
