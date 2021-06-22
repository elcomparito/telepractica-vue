<template>
  <b-container class="bv-example-row">
    <b-row class="justify-content-md-center mt-5">
      <b-col col lg="5">
        <b-card
          header-tag="header"
          img-src="img/card-group-empresas.jpg"
          img-alt="Imagen"
          img-top
          class="mb-2"
        >
          <template #header>
            <h6 class="text-center mb-0">¡Regístrate como empresa!</h6>
          </template>

          <b-form @submit.prevent="createEmpresa()">
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
              <label>Rol</label>
              <b-form-select
                v-model="form.rol_id"
                :options="rols"
                text-field="nombre"
                value-field="id"
                class="form-control"
                :class="{
                  'is-invalid': form.errors.has('rol_id'),
                }"
              >
                <b-form-select-option :value="null"
                  >Seleccione una opción</b-form-select-option
                >
              </b-form-select>
              <has-error :form="form" field="rol_id"></has-error>
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
              <label>Área</label>
              <b-form-select
                v-model="form.area_id"
                :options="areas"
                text-field="nombre"
                value-field="id"
                class="form-control"
                :class="{
                  'is-invalid': form.errors.has('area_id'),
                }"
              >
                <b-form-select-option :value="null"
                  >Seleccione una opción</b-form-select-option
                >
              </b-form-select>
              <has-error :form="form" field="area_id"></has-error>
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
      areas: [],
      estado_usuarios: [],
      rols: [],

      form: new Form({
        id: null,
        run: null,
        email: null,
        name: null,
        password: null,
        estado_usuario_id: null,
        area_id: null,
        rol_id: null,
      }),
    };
  },

  methods: {
    getEstadoUsuarios() {
      axios.get("/admin/api/estado-usuario/get-all").then((response) => {
        this.estado_usuarios = response.data.estado_usuarios;
      });
    },

    getRolsForEmpresa() {
      axios.get("/admin/api/rol/get-all-for-empresa").then((response) => {
        this.rols = response.data.rols;
      });
    },

    getAreas() {
      axios.get("/admin/api/area/get-all").then((response) => {
        this.areas = response.data.areas;
      });
    },

    getEmpresas() {
      axios.get("/admin/api/empresa/get-all").then((response) => {
        this.empresas = response.data.empresas;
        this.chargeTabla();
      });
    },

    createEmpresa() {
      this.form
        .post("/soy-empresa/create")
        .then(() => {
          Fire.$emit("saveChanges");
          this.$toastr.s("Empresa registrada correctamente", "Registro");
        })
        .catch(() => {
          this.$toastr.e("No se pudo completar el registro", "Error");
        });
    },
  },

  created() {
    this.getAreas();
    this.getEstadoUsuarios();
    this.getRolsForEmpresa();
    Fire.$on("saveChanges", () => {
      this.form.reset();
    });
  },
};
</script>
