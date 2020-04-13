//index.js
//获取应用实例
const config = require('../../utils/config.js');
Page({
  data: {
    userInfo: null,
  },
  //事件处理函数

  onLoad: function (options) {

  },
  //登录
  getUserInfo: function (res) {
    var userInfo = res.detail.userInfo;
    wx.setStorageSync("userInfo", userInfo);
    console.log(userInfo.nickName);
    this.setData({
      userInfo: userInfo,
    })
    wx.login({
      success(res) {
        if (res.code) {
          wx.request({
            url: config.baseUrl + "/token",
            data: {
              code: res.code,
              nickName: userInfo.nickName,
              avatarUrl: userInfo.avatarUrl
            },
            method: 'POST',
            dataType: 'json',
            success: function (res) {
              console.log(res);
              console.log(res.data.token);
              var token = res.data.token;
              wx.setStorageSync('token', token);
            }

          })
        }
      }

    })

  },

//退出登录
  exit:function(event){
    wx.removeStorageSync('userInfo');
    wx.removeStorageSync('token');
    this.setData({
      userInfo:null
    })

  }

})
