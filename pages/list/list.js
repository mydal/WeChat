// pages/list/list.js
const config = require('../../utils/config.js');

Page({

  /**
   * 页面的初始数据
   */
  data: {
    focus: {},
    list: {},

  },
  showDetail: function (event) {
    var id = event.target.dataset.id; //获取点击时拿到的id
    wx.navigateTo({
      url: '/pages/detail/detail?id=' + id,  //带上id跳转到详情页
    });

  },

  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
    var rotation = {};
    var first = {};
    var that = this;
    wx.request({
      url: config.baseUrl + '/rotations',  //电影轮播图
      method: 'get',
      header: {
        "Content-Type": "json"
      },
      success: function (res) {
        // console.log(res.data.data);
        rotation = res.data.data;
        that.setData({
          focus: rotation
        })
      }
    })

    wx.request({
      url: config.baseUrl + '/firsts', //电影首页
      method: 'get',
      header: {
        "Content-Type": "json"
      },
      success: function (res) {
        // console.log(res.data);
        first = res.data.data;
        that.setData({
          list: first
        })

      }
    })

  },

  /**
   * 生命周期函数--监听页面初次渲染完成
   */
  onReady: function () {

  },

  /**
   * 生命周期函数--监听页面显示
   */
  onShow: function () {

  },

  /**
   * 生命周期函数--监听页面隐藏
   */
  onHide: function () {

  },

  /**
   * 生命周期函数--监听页面卸载
   */
  onUnload: function () {

  },

  /**
   * 页面相关事件处理函数--监听用户下拉动作
   */
  onPullDownRefresh: function () {

  },

  /**
   * 页面上拉触底事件的处理函数
   */
  onReachBottom: function () {

  },

  /**
   * 用户点击右上角分享
   */
  onShareAppMessage: function () {

  }
})