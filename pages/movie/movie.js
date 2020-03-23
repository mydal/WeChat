// pages/movie/movie.js
Page({

  /**
   * 页面的初始数据
   */
  data: {
    focus: [
      {
        id: 1,
        pic: '/pages/images/1.jpg'
      },
      {
        id: 2,
        pic: '/pages/images/2.jpg'
      },
      {
        id: 3,
        pic: '/pages/images/3.jpg'
      },
      {
        id: 4,
        pic: '/pages/images/4.jpg'
      }
    ],

    list: [
      {
        id: 1,
        title: 'Hello!树先生',
        pic: '/pages/images/2.jpg',
        text: '该片讲述一个叫“树”的人，他的村庄异常寒冷，积雪难化。“树”还是单身，在村里的汽修铺工作。他常去村口的酒馆和朋友喝酒，一起长大的伙伴，有人开着好车成了煤老板，有人远在省城办私立学校，有人还在种地。聚会的时候，如果没有被人取笑，“树”就沉默着，像旷野里被人忘记的一棵树。',
        icon1: '/pages/images/view.png',
        icon2: '/pages/images/star.png',
        likeNum: 100,
        zanNum: 45
      },
      {
        id: 2,
        title: '扫毒2天地对决',
        pic: '/pages/images/3.jpg',
        text: '《扫毒2：天地对决》是由邱礼涛执导的动作电影，由刘德华担任监制，刘德华、古天乐、苗侨伟、林嘉欣领衔主演，张国强、陈家乐、卫诗雅、恭硕良、欧阳靖联合主演。该片以毒品为线索，讲述了慈善家兼金融巨子余顺天与香港最大毒贩地藏之间由禁毒引发的一场天地对决。该片于2019年7月5日在中国内地上映。2019年10月8日，电影《扫毒2：天地对决》将代表中国香港参评2020年第92届奥斯卡最佳国际影片（原最佳外语片）',
        icon1: '/pages/images/view.png',
        icon2: '/pages/images/star.png',
        likeNum: 100,
        zanNum: 45
      },
      {
        id: 3,
        title: '没有和解',
        pic: '/pages/images/1.jpg',
        text: '《没有和解》(1965年)，是根据海因利希·伯尔的小说<九点半钟的台球>改编而成的。影片通过三代人的生活将希特勒时代的德国与联邦德国在战后现实做了对比，演员口中是极具有文学化台词，影片演员的说话方式、场面调度和画面构成旨在让人们体验现实，而不是面对现实。',
        icon1: '/pages/images/view.png',
        icon2: '/pages/images/star.png',
        likeNum: 100,
        zanNum: 45
      }

    ]

  },
  showDetail: function (event) {
    var id = event.target.dataset.id;
    wx.navigateTo({
      url: '/pages/detail/detail?id='+id,
      success: function (res) { },
      fail: function (res) { },
      complete: function (res) { },
    });
  },



  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {

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