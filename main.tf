provider "aws" {
  region = "us-east-1"
}

# Create a secure security group for your PHP web app
resource "php-sg" "php-sg" {
  name        = "php-sg"
  description = "Allow HTTP and SSH"

  ingress {
    from_port   = 80
    to_port     = 80
    protocol    = "tcp"
    cidr_blocks = ["0.0.0.0/0"]
  }

  ingress {
    from_port   = 22
    to_port     = 22
    protocol    = "tcp"
    cidr_blocks = ["44.201.49.154"] # Restrict SSH to your IP
  }

  egress {
    from_port   = 0
    to_port     = 0
    protocol    = "-1"
    cidr_blocks = ["0.0.0.0/0"]
  }
}

# Provision an EC2 instance
resource "aws_instance" "web_server" {
  ami           = "ami-0d97d7f07b25dd693" # Example Ubuntu AMI ID
  instance_type = "t3.micro"
  security_groups = [sg-06a4a17b06ff0cf1c.name]
  key_name      = "php-keypair"

  tags = {
    Name = "PHP-webServer"
  }
}