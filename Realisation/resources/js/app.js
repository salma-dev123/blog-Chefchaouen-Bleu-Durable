import './bootstrap';
import 'preline';

document.addEventListener("DOMContentLoaded", () => {
  if (window.HSStaticMethods) {
    window.HSStaticMethods.autoInit();
  }
});

import { Editor } from 'https://esm.sh/@tiptap/core@2.11.0';
import StarterKit from 'https://esm.sh/@tiptap/starter-kit@2.11.0';
import Placeholder from 'https://esm.sh/@tiptap/extension-placeholder@2.11.0';
import Paragraph from 'https://esm.sh/@tiptap/extension-paragraph@2.11.0';
import Bold from 'https://esm.sh/@tiptap/extension-bold@2.11.0';
import Underline from 'https://esm.sh/@tiptap/extension-underline@2.11.0';
import Link from 'https://esm.sh/@tiptap/extension-link@2.11.0';
import BulletList from 'https://esm.sh/@tiptap/extension-bullet-list@2.11.0';
import OrderedList from 'https://esm.sh/@tiptap/extension-ordered-list@2.11.0';
import ListItem from 'https://esm.sh/@tiptap/extension-list-item@2.11.0';
import Blockquote from 'https://esm.sh/@tiptap/extension-blockquote@2.11.0';

document.addEventListener('DOMContentLoaded', () => {
  const editorElement = document.querySelector('#hs-editor-tiptap [data-hs-editor-field]');
  if (!editorElement) return;

  const editor = new Editor({
    element: editorElement,
    editorProps: {
      attributes: {
        class: 'relative min-h-40 p-3'
      }
    },
    extensions: [
      StarterKit.configure({
        history: false
      }),
      Placeholder.configure({
        placeholder: 'Add a message, if you\'d like.',
        emptyNodeClass: 'before:text-gray-500'
      }),
      Paragraph.configure({
        HTMLAttributes: {
          class: 'text-inherit text-gray-800 dark:text-neutral-200'
        }
      }),
      Bold.configure({
        HTMLAttributes: {
          class: 'font-bold'
        }
      }),
      Underline,
      Link.configure({
        HTMLAttributes: {
          class: 'inline-flex items-center gap-x-1 text-blue-600 decoration-2 hover:underline focus:outline-hidden focus:underline font-medium dark:text-white'
        }
      }),
      BulletList.configure({
        HTMLAttributes: {
          class: 'list-disc list-inside text-gray-800 dark:text-white'
        }
      }),
      OrderedList.configure({
        HTMLAttributes: {
          class: 'list-decimal list-inside text-gray-800 dark:text-white'
        }
      }),
      ListItem.configure({
        HTMLAttributes: {
          class: 'marker:text-sm'
        }
      }),
      Blockquote.configure({
        HTMLAttributes: {
          class: 'relative border-s-4 ps-4 sm:ps-6 dark:border-neutral-700 sm:[&>p]:text-lg'
        }
      })
    ]
  });

  const actions = [
    {
      id: '#hs-editor-tiptap [data-hs-editor-bold]',
      fn: () => editor.chain().focus().toggleBold().run()
    },
    {
      id: '#hs-editor-tiptap [data-hs-editor-italic]',
      fn: () => editor.chain().focus().toggleItalic().run()
    },
    {
      id: '#hs-editor-tiptap [data-hs-editor-underline]',
      fn: () => editor.chain().focus().toggleUnderline().run()
    },
    {
      id: '#hs-editor-tiptap [data-hs-editor-strike]',
      fn: () => editor.chain().focus().toggleStrike().run()
    },
    {
      id: '#hs-editor-tiptap [data-hs-editor-link]',
      fn: () => {
        const url = window.prompt('URL');
        editor.chain().focus().extendMarkRange('link').setLink({ href: url }).run();
      }
    },
    {
      id: '#hs-editor-tiptap [data-hs-editor-ol]',
      fn: () => editor.chain().focus().toggleOrderedList().run()
    },
    {
      id: '#hs-editor-tiptap [data-hs-editor-ul]',
      fn: () => editor.chain().focus().toggleBulletList().run()
    },
    {
      id: '#hs-editor-tiptap [data-hs-editor-blockquote]',
      fn: () => editor.chain().focus().toggleBlockquote().run()
    },
    {
      id: '#hs-editor-tiptap [data-hs-editor-code]',
      fn: () => editor.chain().focus().toggleCode().run()
    }
  ];

  actions.forEach(({ id, fn }) => {
    const action = document.querySelector(id);

    if (action === null) return;

    action.addEventListener('click', fn);
  });
});

document.querySelector('form').addEventListener('submit', function (e) {
  const editorContent = document.querySelector('[data-hs-editor-field]').innerHTML;
  document.getElementById('contenu').value = editorContent;
});

// Custom Editor Logic (moved from blade files)
document.addEventListener('DOMContentLoaded', function () {
  // Slug Management
  const titleInput = document.getElementById('titre');
  const slugInput = document.getElementById('slug');

  if (titleInput && slugInput) {
    titleInput.addEventListener('input', function () {
      const initialSlug = slugInput.getAttribute('data-initial-slug') || '';
      if (!slugInput.value || slugInput.value === initialSlug) {
        const slug = this.value
          .toLowerCase()
          .replace(/[^\w\s-]/g, '')
          .replace(/\s+/g, '-')
          .replace(/--+/g, '-');
        slugInput.value = slug;
      }
    });
  }

  // Editor Initialization
  const editorElement = document.querySelector('[data-hs-editor-field]');
  const hiddenInput = document.getElementById('contenu');

  if (editorElement && hiddenInput) {
    function updateHiddenInput() {
      hiddenInput.value = editorElement.innerHTML;
    }

    editorElement.addEventListener('input', updateHiddenInput);
    editorElement.addEventListener('blur', updateHiddenInput);

    // Toolbar Management
    const toolbarButtons = document.querySelectorAll('#hs-editor-tiptap button');

    function updateToolbarButtons() {
      const selection = window.getSelection();
      if (!selection.rangeCount) return;

      // Logic to update button states could be added here if needed
    }

    document.addEventListener('selectionchange', updateToolbarButtons);

    toolbarButtons.forEach(button => {
      button.addEventListener('click', function (e) {
        e.preventDefault();
        let command = '';
        if (this.hasAttribute('data-hs-editor-bold')) command = 'bold';
        else if (this.hasAttribute('data-hs-editor-italic')) command = 'italic';
        else if (this.hasAttribute('data-hs-editor-underline')) command = 'underline';
        else if (this.hasAttribute('data-hs-editor-strike')) command = 'strikeThrough';
        else if (this.hasAttribute('data-hs-editor-link')) command = 'link';
        else if (this.hasAttribute('data-hs-editor-ol')) command = 'insertOrderedList';
        else if (this.hasAttribute('data-hs-editor-ul')) command = 'insertUnorderedList';
        else if (this.hasAttribute('data-hs-editor-code')) command = 'formatBlock';
        else if (this.hasAttribute('data-hs-editor-blockquote')) command = 'formatBlock';

        if (command === 'bold') {
          document.execCommand('bold', false);
        } else if (command === 'italic') {
          document.execCommand('italic', false);
        } else if (command === 'underline') {
          document.execCommand('underline', false);
        } else if (command === 'strikeThrough') {
          document.execCommand('strikeThrough', false);
        } else if (command === 'link') {
          const url = prompt('Entrez l\'URL du lien:');
          if (url) {
            document.execCommand('createLink', false, url);
          }
        } else if (command === 'insertUnorderedList') {
          document.execCommand('insertUnorderedList', false);
        } else if (command === 'insertOrderedList') {
          document.execCommand('insertOrderedList', false);
        } else if (command === 'formatBlock') {
          if (this.hasAttribute('data-hs-editor-code'))
            document.execCommand('formatBlock', false, 'pre');
          else
            document.execCommand('formatBlock', false, 'blockquote');
        }

        editorElement.focus();
        updateHiddenInput();
      });
    });

    // Keyboard Shortcuts
    editorElement.addEventListener('keydown', function (e) {
      if (e.ctrlKey && e.key === 'b') {
        e.preventDefault();
        document.execCommand('bold', false);
      }
      else if (e.ctrlKey && e.key === 'i') {
        e.preventDefault();
        document.execCommand('italic', false);
      }
      else if (e.ctrlKey && e.key === 'u') {
        e.preventDefault();
        document.execCommand('underline', false);
      }
    });

    // Initialize Content
    if (hiddenInput.value) {
      editorElement.innerHTML = hiddenInput.value;
    } else {
      editorElement.innerHTML = '<p><br></p>';
    }
  }

  if (window.HSStaticMethods) {
    window.HSStaticMethods.autoInit();
  }
});