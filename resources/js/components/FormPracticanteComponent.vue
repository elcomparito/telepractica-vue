<template>
  <b-container class="bv-example-row">
    <b-row class="justify-content-md-center mt-5">
      <b-col col lg="5">
        <b-card
          header-tag="header"
          img-src="img/card-group-ofertas.jpg"
          img-alt="Imagen"
          img-top
          class="mb-2"
        >
          <template #header>
            <h6 class="text-center mb-0">¡Regístrate como practicante!</h6>
          </template>

          <b-form @submit.prevent="createPracticante()">
            <b-form-group>
              <label>R.U.N.</label>
              <input
                v-model="form.run"
                type="text"
                name="run"
                placeholder="R.U.N."
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('run') }"
              />
              <has-error :form="form" field="run"></has-error>
            </b-form-group>

            <b-form-group>
              <label>Email</label>
              <input
                v-model="form.email"
                type="email"
                name="email"
                placeholder="Email"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('email') }"
              />
              <has-error :form="form" field="email"></has-error>
            </b-form-group>

            <b-form-group>
              <label>Nombre</label>
              <input
                v-model="form.name"
                type="text"
                name="name"
                placeholder="Nombre"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('name') }"
              />
              <has-error :form="form" field="name"></has-error>
            </b-form-group>

            <b-form-group>
              <label>Contraseña</label>
              <input
                v-model="form.password"
                type="password"
                name="password"
                placeholder="Contraseña"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('password') }"
              />
              <has-error :form="form" field="password"></has-error>
            </b-form-group>

            <b-form-group>
              <label>Confirmar contraseña</label>
              <input
                v-model="form.password_confirmation"
                type="password"
                name="password_confirmation"
                placeholder="Contraseña"
                class="form-control"
                :class="{
                  'is-invalid': form.errors.has('password_confirmation'),
                }"
              />
              <has-error :form="form" field="password_confirmation"></has-error>
            </b-form-group>

            <b-form-group>
              <label>Estado</label>
              <b-form-select
                v-model="form.estado_usuario_id"
                :options="estado_usuarios"
                text-field="nombre"
                value-field="id"
                class="form-control"
                :class="{
                  'is-invalid': form.errors.has('estado_usuario_id'),
                }"
              >
                <b-form-select-option :value="null"
                  >Seleccione una opción</b-form-select-option
                >
              </b-form-select>
              <has-error :form="form" field="estado_usuario_id"></has-error>
            </b-form-group>

            <b-form-group>
              <label>Nivel Educacional</label>
              <b-form-select
                v-model="form.nivel_educacional_id"
                :options="nivel_educacionals"
                text-field="nombre"
                value-field="id"
                class="form-control"
                :class="{
                  'is-invalid': form.errors.has('nivel_educacional_id'),
                }"
              >
                <b-form-select-option :value="null"
                  >Seleccione una opción</b-form-select-option
                >
              </b-form-select>
              <has-error :form="form" field="nivel_educacional_id"></has-error>
            </b-form-group>

            <b-form-group>
              <label>Tipo de Práctica</label>
              <b-form-select
                v-model="form.tipo_practica_id"
                :options="tipo_practicas"
                text-field="nombre"
                value-field="id"
                class="form-control"
                :class="{
                  'is-invalid': form.errors.has('tipo_practica_id'),
                }"
              >
                <b-form-select-option :value="null"
                  >Seleccione una opción</b-form-select-option
                >
              </b-form-select>
              <has-error :form="form" field="tipo_practica_id"></has-error>
            </b-form-group>

            <b-form-group>
              <label>Región</label>
              <b-form-select
                @change="getComunasByRegion"
                v-model="form.region_id"
                :options="regions"
                text-field="nombre"
                value-field="id"
                class="form-control"
                :class="{
                  'is-invalid': form.errors.has('region_id'),
                }"
              >
                <b-form-select-option :value="null"
                  >Seleccione una opción</b-form-select-option
                >
              </b-form-select>
              <has-error :form="form" field="region_id"></has-error>
            </b-form-group>

            <b-form-group>
              <label>Comuna</label>
              <b-form-select
                id="select-comuna-id"
                v-model="form.comuna_id"
                :options="comunas"
                text-field="nombre"
                value-field="id"
                class="form-control"
                :class="{
                  'is-invalid': form.errors.has('comuna_id'),
                }"
              >
                <b-form-select-option :value="null"
                  >Seleccione una opción</b-form-select-option
                >
              </b-form-select>
              <has-error :form="form" field="comuna_id"></has-error>
            </b-form-group>

            <b-form-group>
              <label>Institución</label>
              <b-form-select
                @change="getCarrerasByInstitucion"
                v-model="form.institucion_id"
                :options="institucions"
                text-field="nombre"
                value-field="id"
                class="form-control"
                :class="{
                  'is-invalid': form.errors.has('institucion_id'),
                }"
              >
                <b-form-select-option :value="null"
                  >Seleccione una opción</b-form-select-option
                >
              </b-form-select>
              <has-error :form="form" field="institucion_id"></has-error>
            </b-form-group>

            <b-form-group>
              <label>Carrera</label>
              <b-form-select
                id="select-carrera-id"
                v-model="form.carrera_id"
                :options="carreras"
                text-field="nombre"
                value-field="id"
                class="form-control"
                :class="{
                  'is-invalid': form.errors.has('carrera_id'),
                }"
              >
                <b-form-select-option :value="null"
                  >Seleccione una opción</b-form-select-option
                >
              </b-form-select>
              <has-error :form="form" field="carrera_id"></has-error>
            </b-form-group>

            <b-button type="submit" variant="secondary" class="float-right">
              Registrar <i class="fas fa-save"></i>
            </b-button>
          </b-form>
        </b-card>
      </b-col>
    </b-row>
  </b-container>
</template>

<script>
export default {
  data() {
    return {
      carreras: [],
      comunas: [],
      institucions: [],
      nivel_educacionals: [],
      regions: [],
      tipo_practicas: [],

      estado_usuarios: [],

      form: new Form({
        id: null,
        run: null,
        email: null,
        name: null,
        password: null,
        carrera_id: null,
        comuna_id: null,
        estado_usuario_id: null,
        institucion_id: null,
        nivel_educacional_id: null,
        region_id: null,
        tipo_practica_id: null,
      }),

      data_carrera_id: null,
      data_comuna_id: null,
    };
  },

  methods: {
    getCarreras() {
      axios.get("/admin/api/carrera/get-all").then((response) => {
        this.carreras = response.data.carreras;
      });
    },

    getCarrerasByInstitucion() {
      document.getElementById("select-carrera-id").disabled = true;
      this.form.carrera_id = null;

      if (this.form.institucion_id != null) {
        axios
          .get(
            "/admin/api/carrera/get-all-by-institucion/" +
              this.form.institucion_id
          )
          .then((response) => {
            this.carreras = response.data.carreras;

            document.getElementById("select-carrera-id").disabled = false;
          });
      }
    },

    getComunas() {
      axios.get("/admin/api/comuna/get-all").then((response) => {
        this.comunas = response.data.comunas;
      });
    },

    getComunasByRegion() {
      document.getElementById("select-comuna-id").disabled = true;
      this.form.comuna_id = null;

      if (this.form.region_id != null) {
        axios
          .get("/admin/api/comuna/get-all-by-region/" + this.form.region_id)
          .then((response) => {
            this.comunas = response.data.comunas;

            document.getElementById("select-comuna-id").disabled = false;
          });
      }
    },

    getEstadoUsuarios() {
      axios.get("/admin/api/estado-usuario/get-all").then((response) => {
        this.estado_usuarios = response.data.estado_usuarios;
      });
    },

    getInstitucions() {
      axios.get("/admin/api/institucion/get-all").then((response) => {
        this.institucions = response.data.institucions;
      });
    },

    getNivelEducacionals() {
      axios.get("/admin/api/nivel-educacional/get-all").then((response) => {
        this.nivel_educacionals = response.data.nivel_educacionals;
      });
    },

    getRegions() {
      axios.get("/admin/api/region/get-all").then((response) => {
        this.regions = response.data.regions;
      });
    },

    getTipoPracticas() {
      axios.get("/admin/api/tipo-practica/get-all").then((response) => {
        this.tipo_practicas = response.data.tipo_practicas;
      });
    },

    createPracticante() {
      this.form
        .post("/soy-practicante/create")
        .then(() => {
          Fire.$emit("saveChanges");
          this.$toastr.s("Practicante registrado correctamente", "Registro");
        })
        .catch(() => {
          this.$toastr.e("No se pudo completar el registro", "Error");
        });
    },
  },

  created() {
    this.getCarreras();
    this.getComunas();
    this.getEstadoUsuarios();
    this.getInstitucions();
    this.getNivelEducacionals();
    this.getRegions();
    this.getTipoPracticas();
    Fire.$on("saveChanges", () => {
      this.form.reset();
    });
  },

  mounted() {
    document.getElementById("select-comuna-id").disabled = true;
    document.getElementById("select-carrera-id").disabled = true;
  },
};
</script>
