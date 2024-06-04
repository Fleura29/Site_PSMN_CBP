import os
import subprocess

def run_generate_links():
    script_path = os.path.join(os.path.abspath(os.path.dirname(__file__)), 'generate_links.py')
    subprocess.run(['python', script_path], check=True)

def setup(app):
    app.connect('builder-inited', run_generate_links)

with open('Liens.txt', 'r', encoding='utf-8') as f:
    liens = f.readlines()

lien_elements = ''.join([f'<li><a class="dropdown-item" href="#">{lien.strip()}</a></li>' for lien in liens])

with open('_templates/liens_header.html', 'w', encoding='utf-8') as f:
    f.write(lien_elements)