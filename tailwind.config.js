
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
              lightwhite:'#e0e3e9',
              lightblue_gray:'#4A4A58',
              dribbble:'#82D2EE',
              alert:'#FFAE33',
              logout:'#393766',
              soft_pink:'#F1EEF9',
          },
          inset:{
              '1/2': '50%',
          }   ,
          fontFamily: {
              poppins: ['Poppins'],
              handwrite:['Gochi Hand'],
          },
          borderRadius:{
              'xl':'1em',
              'custom':'2rem',
              'custom_bg':'3em',
          }

      },
  },
  variants: {},
  plugins: [],
}
