//app.js
App({
  onLaunch(options) {
    console.log('小程序初识化了');
  },
  onShow(options) {
    console.log('小程序显示，从后台进入前台');
  },
  onHide() {
    console.log('小程序隐藏，从前台进入后台');
  },

  // 全局变量
  globalData:{
    userInfo:null
  },
  data:{
    testNum:1,
    testName:'蔡徐坤'
  }
})