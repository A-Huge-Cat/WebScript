import base64

def encode_cookie(cookie):
    bytes_cookie=cookie.encode("utf-8")
    cookie=base64.b64encode(bytes_cookie)
    return cookie

print(encode_cookie("goodboy"))
