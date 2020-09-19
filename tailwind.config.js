
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
              background: "#212B33",
              semi: 'rgba(0, 0, 0, 0.75)',
              womanbg:'#C58A8A',
              dark_gray:'#7D828C',
              lightwhite:'#F2F7FB',
              lightblue_gray:'#4A4A58',
              dribbble:'#011F3B',
              alert:'#FFAE33'
          },
          inset:{
              '1/2': '50%',
          }   ,
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
