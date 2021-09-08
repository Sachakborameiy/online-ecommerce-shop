var _appData = {
    isLogin: false,
    isApp: false,
    memberNumber: 0,
    appPlatform: '',
    jwt: 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJjYXJ0X2lkIjoiYjEzOGZiYTQtYjg0Ni00ZGZiLWE1YmYtZWVhYWEyMjY1NzA0IiwiaXNfZ3Vlc3QiOnRydWUsInV1aWQiOm51bGwsIm1fbm8iOm51bGwsIm1faWQiOm51bGwsImxldmVsIjpudWxsLCJzdWIiOm51bGwsImlzcyI6Imh0dHA6Ly9ta3dlYi5hcGkua3VybHkuc2VydmljZXMvdjMvYXV0aC9yZWZyZXNoIiwiaWF0IjoxNjMwMDI3OTEyLCJleHAiOjE2MzAwMzUxMjYsIm5iZiI6MTYzMDAzMTUyNiwianRpIjoiSWJNUjd0Um5FZWlNZWV5ayJ9.OMZdqqLwQfQtyMvkJwvG9a8_wN_ma_xRZeEM9U2FsZc',
    apiHost: 'api.kurly.com',
    is_release_build: true,
    verCheck: [],
    uuid: 'b138fba4-b846-4dfb-a5bf-eeaaa2265704',
    isDirect: window.sessionStorage.getItem('isDirect') === '1' ? true : false
};

var appResult = {
    appCheck : _appData.isApp,
    appDevice : _appData.appPlatform,
    verCheck : _appData.verCheck,
    is_sess : _appData.isLogin,
    isSession : _appData.isLogin,
    is_release_build : _appData.is_release_build,
    timestamp: parseInt("1630032199568", 10)
}

if (_appData.isApp){
    var appVer, appVerLen, appVerCount;
    appVer = '';
    appVer = appVer.split('.');
    appVerLen = appVer.length;
    for(appVerCount = 0; appVerCount < appVerLen; appVerCount++){
        appResult.verCheck.push(appVer[appVerCount]);
    }
}

var webStatus = appResult;
