
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
              trans_gray:'rgba(255,255,255,0.5)',
              womanbg:'#C58A8A',
              dark_gray:'#7D828C',
              lightwhite:'#e0e3e9',
              lightblue_gray:'#4A4A58',
              dribbble:'#82D2EE',
              alert:'#FFAE33',
              logout:'#393766',
              soft_pink:'#F1EEF9',
              soft_purple:'#cabbe9',
              redme:'#28385e',
          },
          inset:{
              '1/2': '50%',
          }   ,
          fontFamily: {
              poppins: ['Poppins'],
              handwrite:['Gochi Hand'],
              dancing:['Dancing Script'],
          },
          borderRadius:{
              'xl':'1em',
              'custom':'2rem',
              'custom_bg':'3em',
          },
          zIndex:{
            '100':100,
          },
          height:{
            '1/2':'50%',
              '5/7':'71.4285%',
              '12/10':'120%',
              '1/3':'35%',
              '8/10':'85%',
              '2/10':'15%',
          },
          translate: {
                      '1/7': '14.2857143%',
           '2/7': '28.5714286%',
           '3/7': '42.8571429%',
            '4/7': '57.1428571%',
              '5/7': '71.4285714%',
            '6/7': '85.7142857%',
                },
          fontSize: {
              // Or with a default line-height as well
             '7xl':'6rem',
          }
       },

  },
  variants: {},
  plugins: [],
}
