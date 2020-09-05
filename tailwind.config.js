
module.exports = {
  purge: [],
  theme: {
      extend: {
          backgroundImage: theme =>({
              'admin_bg': "url('{{asset('images/admin-bg.jpg')}}')",
          }),
          colors: {
              secondary: "#86A6DF",
              primary: "#F5F5F5",
              background: "#4A4A58",
          },
          fontFamily: {
              poppins: ['Poppins'],
          },
          borderRadius:{
              'custom':'2rem',
          }

      },
  },
  variants: {},
  plugins: [],
}
