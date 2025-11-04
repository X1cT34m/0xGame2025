import socketserver
import random
import string

# --- 配置区 ---
HOST, PORT = "0.0.0.0", 5555 # 你可以改成5555
FLAG = "0xGame{B@se64_1s_Eassy_rIght?_y0u_@re_BEst_one!!!}"
PADDING_CHAR = '='
BASE_CHARSET = string.ascii_letters + string.digits + '+/'

class CustomBase64Encoder:
    """
    使用自定义字符集的Base64编码器。
    此版本的 encode 函数逻辑经过修正，确保行为与标准库一致。
    """
    def __init__(self, charset, padding_char='='):
        if len(charset) != 64:
            raise ValueError("字符集必须包含64个字符")
        self.charset = charset.encode('ascii') # 将字符集预先编码为bytes
        self.padding_char = padding_char.encode('ascii')

    def encode(self, data_bytes: bytes) -> str:
        # --- 经过修正和简化的编码逻辑 ---
        n = len(data_bytes)
        parts = []
        
        # 处理完整的3字节块
        i = 0
        while i + 3 <= n:
            b1, b2, b3 = data_bytes[i:i+3]
            i += 3
            
            idx1 = b1 >> 2
            idx2 = ((b1 & 0x03) << 4) | (b2 >> 4)
            idx3 = ((b2 & 0x0f) << 2) | (b3 >> 6)
            idx4 = b3 & 0x3f
            
            parts.append(bytes([self.charset[idx1], self.charset[idx2], self.charset[idx3], self.charset[idx4]]))
        
        # 处理末尾剩余的字节
        if i < n:
            b1 = data_bytes[i]
            if i + 1 < n:
                b2 = data_bytes[i+1]
                idx1 = b1 >> 2
                idx2 = ((b1 & 0x03) << 4) | (b2 >> 4)
                idx3 = (b2 & 0x0f) << 2
                parts.append(bytes([self.charset[idx1], self.charset[idx2], self.charset[idx3]]))
                parts.append(self.padding_char)
            else:
                idx1 = b1 >> 2
                idx2 = (b1 & 0x03) << 4
                parts.append(bytes([self.charset[idx1], self.charset[idx2]]))
                parts.append(self.padding_char * 2)

        encoded_bytes = b"".join(parts)
        return encoded_bytes.decode('ascii')


class ChallengeHandler(socketserver.BaseRequestHandler):

    def handle(self):
        shuffled_list = list(BASE_CHARSET)
        random.shuffle(shuffled_list)
        self.secret_charset = "".join(shuffled_list)
        self.encoder = CustomBase64Encoder(self.secret_charset, PADDING_CHAR)
        self.send_line("="*40)
        self.send_line("  Welcome to the Base64 Deep Dive Challenge!")
        self.send_line("="*40)
        try:
            self.main_menu()
        except (ConnectionResetError, BrokenPipeError):
            print(f"客户端 {self.client_address} 断开连接。")
    def send(self, message: str):
        self.request.sendall(message.encode('utf-8'))
    def send_line(self, message: str):
        self.send(message + '\n')
    def read_line(self) -> str:
        return self.request.recv(1024).strip().decode('utf-8')
    def main_menu(self):
        while True:
            self.send_line("\n[ Main Menu ]")
            self.send_line("1. Encode your string (编码模式)")
            self.send_line("2. Submit the charset to get flag (提交字符集)")
            self.send("Choose an option (1/2): ")
            choice = self.read_line()
            if choice == '1': self.encoder_mode()
            elif choice == '2': 
                if self.validator_mode():
                    return
            else: self.send_line("Invalid option. Please try again.")
    def encoder_mode(self):
        self.send_line("\n--- Encoder Mode ---")
        self.send_line("Enter any string to encode. Send '!q' to return to the menu.")
        while True:
            self.send("> ")
            user_input = self.read_line()
            if user_input == '!q':
                self.send_line("Returning to main menu...")
                break
            if not user_input: continue
            input_bytes = user_input.encode('utf-8')
            encoded_output = self.encoder.encode(input_bytes)
            self.send_line(f"Result: {encoded_output}")
    def validator_mode(self):
        self.send_line("\n--- Validator Mode ---")
        self.send_line("Submit the 64-character set you discovered.")
        self.send_line("Send '!q' to return to the menu.")
        while True:
            self.send("Your charset guess: ")
            guess = self.read_line()
            if guess == '!q':
                self.send_line("Returning to main menu...")
                return False
            if len(guess) != 64:
                self.send_line(f"Error: Your submission has {len(guess)} characters, but 64 are required. Try again.")
                continue
            if guess == self.secret_charset:
                self.send_line("\n[+] CONGRATULATIONS! You finally did it!")
                self.send_line(f"Here is your flag: {FLAG}")
                return True
            else:
                self.send_line("[-] Incorrect. The character set does not match. Please try again.")

if __name__ == "__main__":
    print(f"[*] Server starting on {HOST}:{PORT}")
    server = socketserver.ThreadingTCPServer((HOST, PORT), ChallengeHandler)
    try:
        server.serve_forever()
    except KeyboardInterrupt:
        print("\n[*] Server shutting down.")
        server.shutdown()
