# Sensitive Content Module

The **Sensitive Content** module for Drupal allows administrators to block or obscure sensitive content on their site. It provides a mechanism to tag content as "sensitive" and display a customizable overlay, protecting users from potentially disturbing material.

## Features
- **Block Sensitive Content**: Allows admins to define content as "sensitive" using taxonomy terms (e.g., "Sensitive Content").
- **Customizable Overlay**: Displays a content warning overlay with a configurable message and "See Content" button.
- **Taxonomy Integration**: Integrates with Drupal's taxonomy system to label content as sensitive.
- **Easy Configuration**: Set the class names of content to be blocked in the configuration form.

## Requirements
- Drupal 9 or 10
- The **Taxonomy** module
- The **Context** module 

## Installation
- Download and enable the module

## Configuration

1. Once installed, go to the module's configuration page found under config/media/sensitive_content.
2. Add the class names or IDs of the content you want to be blocked.
3. Save the settings to enable the content checker.

## Usage

1. **Create a Taxonomy Term**: Go to **Admin > Structure > Taxonomy** and create a term like "Sensitive Content".

2. **Create a Context**: 
- Go to **Admin > Configuration > Context**.
- Create a new context, naming it something like "Sensitive Content Display".
- Add a condition for content, specifying the taxonomy term ("Sensitive Content").
- Under the actions, add a "Block" or "Content Obscuration" action, or any custom action that displays the overlay for the sensitive content.

3. **Assign the Term to Content**: When creating or editing content, assign the "Sensitive Content" term to the nodes that you want to block.

4. **Content Obscuration**: On the front-end, any content tagged with "Sensitive Content" will display a content warning overlay. Users must click "See Content" to view the full content.

## Development Status

This module is actively under development. While the core features are functional, there are still improvements to be made, such as:
- Enhanced customization options for the overlay.
- Better performance handling for large sites.
- Additional integrations with other modules for more granular control.

Feel free to contribute or provide feedback to help improve the module.


