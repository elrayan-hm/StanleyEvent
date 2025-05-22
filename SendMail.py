import smtplib
from email.mime.text import MIMEText
from email.mime.multipart import MIMEMultipart
from email.utils import formataddr
from concurrent.futures import ThreadPoolExecutor
from email_validator import validate_email, EmailNotValidError

# SMTP Configuration
SMTP_SERVER = 'smtp.gmail.com'
SMTP_PORT = 587
SMTP_USER = 'xxxx@gmail.com' #add email user smtp
SMTP_PASSWORD = 'xxxx' #password smtp

# add list.txt for emails

# Email content
subject = "[Invitation] STANLEY 2025 – L’innovation numérique née de la récup!"
sender_name = "Stanley Evently"

# Load recipients from list.txt
def load_recipients(file_path='list.txt'):
    with open(file_path, 'r') as file:
        return [line.strip() for line in file if line.strip()]

# Load HTML body from 3.html
def load_html_body(file_path='3.html'):
    with open(file_path, 'r', encoding='utf-8') as file:
        return file.read()

# Send email to a single recipient
def send_email(to_email, html_body):
    try:
        # Validate email format
        validate_email(to_email)

        # Create MIME message
        msg = MIMEMultipart("alternative")
        msg['Subject'] = subject
        msg['From'] = formataddr((sender_name, SMTP_USER))
        msg['To'] = to_email

        # Add HTML content
        html_part = MIMEText(html_body, "html")
        msg.attach(html_part)

        # Send email
        with smtplib.SMTP(SMTP_SERVER, SMTP_PORT) as smtp:
            smtp.starttls()
            smtp.login(SMTP_USER, SMTP_PASSWORD)
            smtp.send_message(msg)

        print(f"[+] Email sent to {to_email}")
    except EmailNotValidError as e:
        print(f"[!] Invalid email {to_email}: {e}")
    except Exception as e:
        print(f"[!] Failed to send to {to_email}: {e}")

# Main function with thread pool
def main():
    recipients = load_recipients()
    if not recipients:
        print("[-] No recipients found in list.txt.")
        return

    html_body = load_html_body()

    # Use lambda to pass html_body to send_email
    with ThreadPoolExecutor(max_workers=5) as executor:
        executor.map(lambda email: send_email(email, html_body), recipients)

if __name__ == "__main__":
    main()
