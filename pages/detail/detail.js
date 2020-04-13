const config = require('../../utils/config.js');
Page({

  /**
   * 页面的初始数据
   */
  data: {
    item: {},
    isCollected: false,
    isPlay: false,
    comments: [],
    optionss: null,
    inputValue: '',
    length: 0
  },

  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
    var optionss = options;
    this.setData({
      optionss: optionss
    })
    // console.log(this);
    var id = options.id; //获取传过来的首页id
    var article = {};
    // var that = this;
    wx.request({
      url: config.baseUrl + '/article/' + id,
      method: 'get',
      header: {
        "Content-Type": "json"
      },
      success: (res) => {
        // console.log(res.data.data[i].id);
        article = res.data.data;
        this.setData({
          item: article,

        })
      }
    })
    // 获取所有评论
    wx.request({
      url: config.baseUrl + '/comments/' + id,
      success: (res) => {
        var comments = res.data.data;
        this.setData({
          comments: comments
        })
        // console.log(comments);
      }
    })

    var articlesCollection = wx.getStorageSync('articles-collection');
    if (articlesCollection) {
      // 已经缓存过 就获取当前文章的缓存状态
      var currentCollection = articlesCollection[id];
      this.setData({
        isCollected: currentCollection
      })
    } else {
      // 没有缓存过直接以对象的形式存储为false
      var newCollection = {};
      newCollection[id] = false;
      wx.setStorageSync('articles-collection', newCollection);
    }



  },
  // 收藏
  collected(event) {
    // console.log(this);
    this.setData({
      isCollected: !this.data.isCollected
    })
    // 调用信息提示函数
    this.showToast();
  },
  // 信息提示
  showToast(res) {
    // 添加信息提示
    if (this.data.isCollected) {
      wx.showToast({
        title: '收藏成功',
        icon: 'success',
        duration: 2000
      })
    } else {
      wx.showToast({
        title: '取消收藏成功',
        icon: 'success',
        duration: 2000
      })
    }
  },

  // 播放音乐
  playMusic(event) {
    this.setData({
      isPlay: !this.data.isPlay
    })
    // console.log(this.data.item); //拿到了赋值后的详情信息
    const music = wx.getBackgroundAudioManager();
    if (this.data.isPlay) {
      music.title = this.data.item.music.title //音频标题
      music.epname = this.data.item.music.epname //专辑名
      music.singer = this.data.item.music.singer //歌手名
      music.coverImgUrl = this.data.item.music.coverImgUrl //歌曲封面图
      music.src = this.data.item.music.src //音频的数据源
    } else {
      // 暂停音乐
      music.pause();
    }
  },

  // 电影评论
  sendComment(event) {

    //验证用户登录
    var token = wx.getStorageSync('token');
    if (!token) {
      wx.showToast({
        title: '请先登录',
        icon: 'none'
      })
      return false;
    }
    // console.log(event.detail.value);
    // 输入评论
    var comment = event.detail.value;
    var articleId = event.target.dataset.id;
    wx.request({
      url: config.baseUrl + '/comments',
      method: 'post',
      header: {
        token: token

      },
      data: {
        content: comment,
        articleid: articleId
      },
      success: (res) => {
        // console.log(res);
        if (res.data.status == 1) {
          this.setData({
            length: comment.length
          })
          console.log(this.data.length);
          if (this.data.length > 20) {
            wx.showToast({
              title: '太长了你',
            })
          } else {
            wx.showToast({
              title: '评论成功',
            })
            this.onLoad(this.data.optionss); //强制刷新页面
            this.setData({
              inputValue: '' //将data的inputValue清空
            });

          }
        } else {
          wx.showToast({
            title: '评论失败',
            icon: 'loading'
          })
        }
      }

    }),
      //评论返给前台
      wx.request({
        url: config.baseUrl + '/comments/' + articleId,
        success: (res) => {
          var comments = res.data.data;
          console.log(this.data.length);
          if (this.data.length > 20) {
            wx.showToast({
              title: '太长了你',
            })
          } else {
            this.setData({
              comments: comments
            })

          }


          // console.log(comments);
        }
      })

  },
  //删除评论
  del: function (event) {
    //验证用户登录
    var token = wx.getStorageSync('token');
    if (!token) {
      wx.showToast({
        title: '请先登录',
        icon: 'none'
      })
      return false;
    }

    var id = event.target.dataset.id;
    wx.showModal({
      title: '删除',
      content: '确定要删除此评论么',
      success: (res) => {
        if (res.confirm) {
          console.log('点击确定')
          wx.request({
            url: config.baseUrl + '/comments/' + id,
            header: {
              token: token
            },
            data: {
              id: id
            },
            method: 'delete',
            success: (res) => {
              console.log(res);
              this.onLoad(this.data.optionss);
            }

          })
        } else if (res.cancel) {
          console.log('点击取消');
        }
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