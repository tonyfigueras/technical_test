export default {
    props: ["id_user"],
    data() {
        return {
            
           
            mails: {},
            mail:null,
            err: false,
            msg: null,
            datos: null,
            busy: false,
            search: null,
            iduse:null,
            errors: [],
            pagination: {
                current: 1,
                total: 0
            }
        };
    },

    computed: {},
    created: function() {
        this.allmail();
    },
    mounted() {
        this.allmail();
    },
    methods: {
       


        allmail() {
              axios
                .post(
                    "/allemail?page=" + this.pagination.current,

                    {
                        params: {
                            search: this.search,
                            iduse: this.id_user
                        }
                    }
                )
                .then(response => {
                    this.mails = response.data.data;
                    this.pagination.current = response.data.current_page;
                    this.pagination.total = response.data.last_page;
                });
        },
        onPageChange() {
            this.allmail();
        },

        find() {
            this.wait = true;
            this.page = 1;
            this.total = 0;
            this.allmail();
            this.wait = false;
        },
      
    }
};
