// pages/movie/movie.js
const config = require('../../utils/config.js');
Page({

  /**
   * 页面的初始数据
   */
  data: {
    focus: {},
    list: {},
    currentTab: 0,
    hots: [],
    news: [],
    soons: []
  },

  swichNav: function(e) {
    // console.log(e);
    var that = this;
    if (this.data.currentTab === e.target.dataset.current) {
      return false;
    } else {
      that.setData({
        currentTab: e.target.dataset.current,
      })
    }
  },
  swiperChange: function(e) {
    // console.log(e);
    this.setData({
      currentTab: e.detail.current,
    })

  },

  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function(options) {

    // 豆瓣口碑电影接口调用
    wx.request({
        url: 'https://douban.uieee.com/v2/movie/weekly?apikey=0df993c66c0c636e29ecbb5344252a4a',
        header: {
          "Content-Type": "json"
        },
        method: 'get',
        success: (res) => {
          var arr = res.data.subjects;
          for (var i = 0; i < arr.length; i++) {
            arr[i].subject.title = arr[i].subject.title.slice(0, 6);
          }
          // console.log(arr);
          this.setData({
            hots: arr
          })
        }
      }),
      // 豆瓣电影新片榜接口调用
      wx.request({
        url: 'https://douban.uieee.com/v2/movie/new_movies?apikey=0df993c66c0c636e29ecbb5344252a4a',
        header: {
          "Content-Type": "json"
        },
        method: 'get',
        success: (res) => {
          var arr = res.data.subjects;
          for (var i = 0; i < arr.length; i++) {
            arr[i].title = arr[i].title.slice(0, 6);
          }
          // console.log(arr);
          this.setData({
            news: arr
          })
        }
      }),
      // 热播榜
      wx.request({
        url: 'https://douban.uieee.com/v2/movie/us_box?apikey=0df993c66c0c636e29ecbb5344252a4a',
        header: {
          "Content-Type": "json"
        },
        method: 'get',
        success: (res) => {
          var arr = res.data.subjects;
          // console.log(arr);
          for (var i = 0; i < arr.length; i++) {
            arr[i].subject.title = arr[i].subject.title.slice(0, 6);
          }
          // console.log(arr);
          this.setData({
            soons: arr
          })
        }
      })




  },

  /**
   * 生命周期函数--监听页面初次渲染完成
   */
  onReady: function() {
    // console.log('渲染完成');

  },

  /**
   * 生命周期函数--监听页面显示
   */
  onShow: function() {
    // console.log('显示前台');

  },

  /**
   * 生命周期函数--监听页面隐藏
   */
  onHide: function() {
    // console.log('页面隐藏,切入后台');

  },

  /**
   * 生命周期函数--监听页面卸载
   */
  onUnload: function() {
    // console.log('页面卸载时触发'); //redirectTo 或 navigateBack 到其他页面时触发

  },

  /**
   * 页面相关事件处理函数--监听用户下拉动作
   */
  onPullDownRefresh: function() {

  },

  /**
   * 页面上拉触底事件的处理函数
   */
  onReachBottom: function() {

  },

  /**
   * 用户点击右上角分享
   */
  onShareAppMessage: function() {

  }
})