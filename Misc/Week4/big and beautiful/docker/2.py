#!/usr/bin/env python3
# -*- coding: utf-8 -*-

import time
import random
import socket
import sys
import os
import json
from datetime import datetime, timedelta

QUESTIONS = [
    "被攻陷的机器中，用户0xGame的明文密码是？",
    "攻击者利用的漏洞的CVE编号是？",
    "攻击者生成木马用的cmd命令是？",
    "请提交攻击者在数据库中修改的管理员密码。",
    "请提交攻击者获得的重要文件的内容。",
    "请提交攻击者得到的域用户的账号密码。",
    "请提交域用户所在的域名。",
    "请给出域控的主机名称。"
]

EXAMPLES = [
    "例如：admin123",
    "例如：CVE-2021-44228",
    "例如：dir /s",
    "例如：admin123",
    "例如：Very_important_file!",
    "例如：st4rr_123456",
    "例如：st4rr.top",
    "例如：COMPUTERNAME"
]

ANSWERS = [
    "12345qwerty",
    "CVE-2023-41892",
    "echo ^<?php @eval^($^_POST^[1^]^)^;?^> > shell.php",
    "This_is_the_h4ck3r's_p@ssw0rd!!!",
    "I_think_spaghetti_should_be_mixed_with_No.42_concrete.",
    "vridge334_hP3$vKc@7mXr!9L",
    "0xgaammee.com",
    "0XGAMEDC"
]

FLAG = "🎉 0xGame{Th1s_t4sk_1s_TREMENDOUSLY_b1g_and_b3autifu1_isnt_1t?} 🎉"

MAX_SESSIONS_PER_HOUR = 5 
LOG_FILE = "/tmp/ctf_attempts.log"

class GlobalAttemptLimiter:
    def __init__(self, log_file, max_per_hour):
        self.log_file = log_file
        self.max_per_hour = max_per_hour
        self.cache = self.load_attempts()

    def load_attempts(self):
        if not os.path.exists(self.log_file):
            return []
        try:
            with open(self.log_file, 'r') as f:
                data = json.load(f)
            cutoff = datetime.now() - timedelta(hours=1)
            recent = []
            for item in data:
                try:
                    t = datetime.fromisoformat(item['time'])
                    if t > cutoff:
                        recent.append(item)
                except:
                    continue
            return recent
        except:
            return []

    def save_attempt(self, ip):
        self.cache.append({
            'ip': ip,
            'time': datetime.now().isoformat()
        })
        try:
            with open(self.log_file, 'w') as f:
                json.dump(self.cache, f, indent=2)
        except:
            pass 

    def is_allowed(self, ip):
        now = datetime.now()
        recent = [r for r in self.cache if r['ip'] == ip]
        if len(recent) >= self.max_per_hour:
            return False, f"⛔ 您的IP ({ip}) 已达到每小时 {self.max_per_hour} 次会话上限，请1小时后重试。"
        return True, ""

    def log_session(self, ip):
        allowed, msg = self.is_allowed(ip)
        if not allowed:
            return False, msg
        self.save_attempt(ip)
        return True, ""

class CTFSession:
    def __init__(self, ip):
        self.ip = ip
        self.token = f"{random.randint(1000,9999):04d}"
        self.wrong_streak = 0
        self.total_attempts = 0
        self.max_total_attempts = 20

    def can_continue(self):
        if self.total_attempts >= self.max_total_attempts:
            return False, f"⛔ 您已用完 {self.max_total_attempts} 次尝试机会。"
        return True, ""

    def record_attempt(self):
        self.total_attempts += 1

    def apply_penalty(self):
        delay = min(15, 2 ** self.wrong_streak)
        print(f"\033[33m[⏳] 答错，{delay}秒后可重试...\033[0m")
        time.sleep(delay)
        self.wrong_streak += 1

    def reset_streak(self):
        self.wrong_streak = 0

def clear_screen():
    os.system('cls' if os.name == 'nt' else 'clear')

def print_banner():
    print("🧩 请根据分析结果回答以下问题                           ")
    print("🏁 全部答对即可获取 flag                               ")

def print_success(msg):
    print(f"\033[1;32m[✓] {msg} ✅\033[0m")

def print_error(msg):
    print(f"\033[1;31m[✗] {msg} ❌\033[0m")

def print_info(msg):
    print(f"\033[1;34m[→] {msg}\033[0m")

def ask_question(index, question, example):
    print(f"\033[1;35m\n📌 第 {index+1}/8 题：\033[1;37m{question}\033[0m")
    print(f"    \033[2;37m{example}\033[0m")
    try:
        return input("      └─➤ 请输入答案: ").strip()
    except (KeyboardInterrupt, EOFError):
        print("\n\033[1;33m[⚡] 退出中...\033[0m")
        sys.exit(0)

def main():
    print_banner()
    try:
        ip = socket.gethostbyname(socket.gethostname())
    except:
        ip = "127.0.0.1"

    limiter = GlobalAttemptLimiter(LOG_FILE, MAX_SESSIONS_PER_HOUR)
    allowed, msg = limiter.log_session(ip)
    if not allowed:
        print_error(msg)
        print_error("🎯 请勿频繁重试，尊重比赛环境。")
        sys.exit(1)

    session = CTFSession(ip)
    print_info(f"会话编号: {session.token}")
    print_info(f"规则: 本会话最多 {session.max_total_attempts} 次尝试，答错将延迟。")
    print("-" * 62)

    for i, (q, ex) in enumerate(zip(QUESTIONS, EXAMPLES)):
        while True:
            can_go, msg = session.can_continue()
            if not can_go:
                print_error(msg)
                sys.exit(1)

            ans = ask_question(i, q, ex)
            session.record_attempt()

            if ans == ANSWERS[i]:
                print_success("回答正确！")
                session.reset_streak()
                time.sleep(0.6)
                break
            else:
                print_error("答案错误！")
                session.apply_penalty()

    print("\n" + " " * 6 + "\033[1;42m" + " " * 48 + "\033[0m")
    print(" " * 6 + "\033[1;42m     🎉 恭喜通关！您已获得最终 flag！     \033[0m")
    print(" " * 6 + "\033[1;42m" + " " * 48 + "\033[0m")
    print(f"\n\033[1;33m{FLAG}\033[0m\n")

if __name__ == "__main__":
    main()