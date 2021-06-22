<template>
  <div class="overflow-auto" id="my-table">
    <b-row class="justify-content-md-center mt-5">
      <b-col col lg="8">
        <b-row>

          <b-col lg="6" class="my-1">
            <b-form-group
              label="Búsqueda"
              label-for="filter-input"
              label-cols-sm="3"
              label-align-sm="right"
              label-size="sm"
              class="mb-0"
            >
              <b-input-group size="sm">
                <b-form-input
                  id="filter-input"
                  v-model="filter"
                  type="Buscar"
                  placeholder="Escriba algo"
                ></b-form-input>

                <b-input-group-append>
                  <b-button :disabled="!filter" @click="filter = ''"
                    >Buscar</b-button
                  >
                </b-input-group-append>
              </b-input-group>
            </b-form-group>
          </b-col>

          <b-col lg="6" class="my-1">
            <b-form-group
              label="Ordenar por"
              label-for="initial-sort-select"
              label-cols-sm="3"
              label-align-sm="right"
              label-size="sm"
              class="mb-0"
            >
              <b-form-select
                id="initial-sort-select"
                v-model="sortDirection"
                :options="['ascendente', 'descendente']"
                size="sm"
              ></b-form-select>
            </b-form-group>
          </b-col>

          <b-col lg="6" class="my-1">
            <b-form-group
              v-model="sortDirection"
              label="Remuneración"
              label-cols-sm="3"
              label-align-sm="right"
              label-size="sm"
              class="mb-0"
              v-slot="{ ariaDescribedby }"
            >
              <b-form-checkbox-group
                v-model="filterOn"
                :aria-describedby="ariaDescribedby"
                class="mt-1"
              >
                <b-form-checkbox value="name">Sí</b-form-checkbox>
                <b-form-checkbox value="name">No</b-form-checkbox>
              </b-form-checkbox-group>
            </b-form-group>
          </b-col>

          <b-col sm="5" md="6" class="my-1">
            <b-form-group
              label="Por página"
              label-for="per-page-select"
              label-cols-sm="6"
              label-cols-md="4"
              label-cols-lg="3"
              label-align-sm="right"
              label-size="sm"
              class="mb-0"
            >
              <b-form-select
                id="per-page-select"
                v-model="perPage"
                :options="pageOptions"
                size="sm"
              ></b-form-select>
            </b-form-group>
          </b-col>
        </b-row>
      </b-col>
    </b-row>

    <b-container class="bv-example-row">
      <b-row class="justify-content-md-center mt-5">
        <b-col col lg="10">
          <b-card header-tag="header" tag="Artículo" class="mb-2">
            <template #header>
              <h6 class="text-center mb-0">Ofertas</h6>
            </template>

            <b-card-group v-for="item in items" :key="item.id">
              <b-card no-body class="overflow-hidden m-3">
                <b-row no-gutters>
                  <b-col md="6">
                    <b-card-img
                      src="img/card-group-empresas.jpg"
                      alt="Imagen"
                      class="rounded-0"
                    ></b-card-img>
                  </b-col>

                  <b-col md="6">
                    <b-card-body>
                      <b-card-title>
                        <strong>{{ item.nombre_oferta }}</strong>
                        <br />
                        {{ item.empresa }}
                      </b-card-title>
                      <b-card-text>
                        Descripción: {{ item.descripcion }}
                        <br />
                        Requisitos mínimos: {{ item.requisitos_min }}
                        <br />
                        Fecha de publicación: {{ item.fecha_inicio }}
                        <br />
                        Cupos: {{ item.cupos_totales }}
                        <br />
                        <p v-if="item.remunerada">
                          Remuneración:<i class="fas fa-check-circle ml-1"></i>
                        </p>
                        <p v-else>
                          Remuneración:<i class="fas fa-times-circle ml-1"></i>
                        </p>
                      </b-card-text>

                      <div class="float-right float-bottom">
                        <b-button ref="button-ver" variant="outline-secondary"
                          ><i class="fas fa-eye"></i
                        ></b-button>
                        <b-button class="ml-1" variant="secondary"
                          >Postular</b-button
                        >
                      </div>
                    </b-card-body>
                  </b-col>
                </b-row>
              </b-card>
            </b-card-group>
          </b-card>
        </b-col>
      </b-row>
    </b-container>

    <b-pagination
      v-model="currentPage"
      :total-rows="rows"
      :per-page="perPage"
      aria-controls="my-table"
      class="float-right"
    ></b-pagination>
  </div>
</template>

<script>
export default {
  data() {
    return {
      perPage: 10,
      currentPage: 1,
      items: [],
    };
  },

  methods: {
    getOfertas() {
      axios.get("/api/oferta").then((response) => {
        this.items = response.data.data;
        console.log(this.items);
      });
    },
  },

  created() {
    this.getOfertas();
  },

  computed: {
    rows() {
      return this.items.length;
    },
  },
};
</script>